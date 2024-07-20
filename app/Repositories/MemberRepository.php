<?php

namespace App\Repositories;

use App\Exceptions\ApiOperationFailedException;
use App\Mail\LoginMail;
use App\Models\MemberGroup;
use App\Models\MemberToMemberGroup;
use App\Models\Role;
use App\Models\User;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Throwable;

/**
 * Class CustomerGroupRepository
 */
class MemberRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'image',
        'language_id',
    ];

    /**
     * @return array
     */
    public function getLanguageList()
    {
        $data = [];
        $data['languages'] = User::LANGUAGES;
        $data['memberGroups'] = MemberGroup::orderBy('name', 'asc')->pluck('name', 'id')->toArray();

        return $data;
    }

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }

    /**
     * @param  User  $member
     * @return User
     */
    public function prepareCustomerData($member)
    {
        $member->default_language = $member->default_language != null ? setLanguage($member->default_language) : null;

        return $member;
    }

    /**
     * @param  array  $input
     * @return mixed
     *
     * @throws ApiOperationFailedException
     * @throws Exception
     * @throws Throwable
     */
    public function store($input)
    {


        //   try {
        DB::beginTransaction();
        $pure_password  =  $input['password'];
        $input['password'] = Hash::make($input['password']);

        //            $input['phone'] = preparePhoneNumber($input, 'phone');
        $input['phone'] = removeSpaceFromPhoneNumber($input['phone']);

        //create the member ID

        //run member_id for everybody

        $everybody  =  User::where('member_id', NULL)->get();

        foreach ($everybody  as  $every) {

            //individual update...

            $first_name = substr($every->first_name, 0, 4);

            $last_name  = substr($every->last_name, 0, 1);
            $lastNumber   =  1;

            //help me check if the name exist before , before creating the member id okay

            $check  = User::where([['first_name', $every->first_name], ['last_name',  $every->last_name]])->orderby('id',  'desc')->first();

            if (isset($check->id)) {
                //check all the details.....
                if ($check->member_id   !=  NULL) {

                    $string = $check->member_id;
                    if (preg_match_all('/\d+/', $string, $matches)) {
                        $numbers = $matches[0];
                        $lastNumber = end($numbers)  + 1;
                    }
                }
            }
            $memberID  =   $first_name . $last_name . "00$lastNumber";
            $update  =  User::find($every->id);
            $update->member_id   =  $memberID;
            $update->save();
        }


        $first_name = substr($input['first_name'], 0, 4);

        $last_name  = substr($input['last_name'], 0, 1);
        $lastNumber   =  1;



        //help me check if the name exist before , before creating the member id okay

        $check  = User::where([['first_name', $input['first_name']], ['last_name',  $input['last_name']]])->orderby('id',  'desc')->first();

        if (isset($check->id)) {
            //check all the details.....
            if ($check->member_id   !=  NULL) {

                $string = $check->member_id;
                if (preg_match_all('/\d+/', $string, $matches)) {
                    $numbers = $matches[0];
                    $lastNumber = end($numbers)  + 1;
                }
            }
        }


        $memberID  =   $first_name . $last_name . "00$lastNumber";

        $input['member_id'] =   $memberID;

        $member = User::create($input);
            /*    DB::setDefaultConnection('cal');
            $cal_member = User::create($input);
            DB::setDefaultConnection('mysql') */;

            //search for the group id if administrator is found with it



        if (isset($input['groups']) && !empty(array_filter($input['groups']))) {
            foreach ($input['groups'] as $group) {
                $check_admin  =  MemberGroup::find($group);

                if($check_admin->name  ==   "Administrator"){

                     //edit the user is_admin to 1

                     $change_member  =  User::find( $member->id);
                     $change_member->is_admin  =  1  ;
                     $change_member->save();



                }
                MemberToMemberGroup::create([
                    'user_id' => $member->id,
                    'member_group_id' => $group,
                ]);
            }
        }


        activity()->performedOn($member)->causedBy(getLoggedInUser())
            ->useLog('New Member created.')->log($member->full_name . ' Member created.');

        if (isset($input['send_welcome_email']) && !empty($input['send_welcome_email'])) {

            $member->sendEmailVerificationNotification();

            //send the mail to the user here  ...
            $mailData = [
                'name' => "{$input['first_name']}   {$input['last_name']}",
                'message' => 'This is a test email from Laravel using Blade templates.',
                'password' =>     $pure_password,
                'email'   =>   $input['email']
            ];

            Mail::to($input['email'])
                ->send(new LoginMail($mailData));
        }

        if ((isset($_FILES['image']))) {
            //get the media details .
            //get the image details here okay!
            $size  =  $_FILES['image']['size'];
            if ($size  !=  0) {
                $file  =  $_FILES['image'];
                $image_linnk = upload_files($file);
                $update_user  =  User::find($member->id);
                $update_user->image  =  '/uploads/' . $image_linnk;
                $update_user->save();
            }

            //$member->addMedia($input['image'])
            // ->toMediaCollection(User::COLLECTION_PROFILE_PICTURES, config('app.media_disc'));
        }

        $roles = Role::whereName('staff_member')->first()->id;
        $member->roles()->sync($roles);

        if (isset($input['permissions']) && $input['permissions']) {
            $member->permissions()->sync($input['permissions']);
        }

        DB::commit();

        return $member;
        /*        } catch (Exception $e) {

           echo  $e->getMessage() ;
           die();
            DB::rollBack();
            throw new ApiOperationFailedException($e->getMessage());
        } */
    }

    /**
     * @param  int  $userId
     * @param  array  $input
     * @return bool
     *
     * @throws Throwable
     */
    public function updateMember($userId, $input)
    {
        //        $input['phone'] = preparePhoneNumber($input, 'phone');
        $input['phone'] = removeSpaceFromPhoneNumber($input['phone']);

        /** @var User $member */
        $member = User::find($userId);

        $this->update($input, $userId);
        if (!empty($input['groups'])) {

            $check_administrator  =  false  ;

            foreach($input['groups'] as  $group){
                $check_admin  =  MemberGroup::find($group);

                if($check_admin->name  ==   "Administrator"){

                    $check_administrator  =  true  ;


               }
            }
                       //edit the user is_admin to 1

                       $change_member  =  User::find( $member->id);


            if($check_administrator  ==  true){
                $change_member->is_admin  =  1  ;

            }else{

                $change_member->is_admin  =  0 ;
            }
            $change_member->save();

            $member->memberGroups()->sync($input['groups']);
        }
        activity()->performedOn($member)->causedBy(getLoggedInUser())
            ->useLog('Member updated.')->log($member->full_name . ' Member updated.');

        $roles = Role::whereName('staff_member')->first()->id;
        $member->roles()->sync($roles);

        if (isset($input['permissions']) && $input['permissions']) {
            $member->permissions()->sync($input['permissions']);
        }

        if ((isset($_FILES['image']))) {
            //get the media details .
            //get the image details here okay!
            $size  =  $_FILES['image']['size'];
            if ($size  !=  0) {
                $file  =  $_FILES['image'];
                $image_linnk = upload_files($file);
                $update_user  =  User::find($member->id);
                $update_user->image  =  '/uploads/' . $image_linnk;
                $update_user->save();
            }

            //$member->addMedia($input['image'])
            // ->toMediaCollection(User::COLLECTION_PROFILE_PICTURES, config('app.media_disc'));
        }

        return true;
    }

    /**
     * @return mixed
     */
    public function memberCount()
    {
        return User::selectRaw('count(case when is_enable = 1 then 1 end) as active_members')
            ->selectRaw('count(case when is_enable = 0 then 1 end) as deactive_members')
            ->selectRaw('count(*) as total_members')
            ->where('owner_id', '=', null)->where('owner_type', '=', null)->first();
    }
}
