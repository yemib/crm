<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiOperationFailedException;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Permission;
use App\Models\Task;
use App\Models\User;
use App\Repositories\DepartmentRepository;
use App\Repositories\MemberRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;
use Laracasts\Flash\Flash;
use Throwable;

class MemberController extends AppBaseController
{
    /**
     * @var MemberRepository
     */
    private $memberRepository;

    /** @var DepartmentRepository */
    private $departmentRepo;

    /**
     * MemberController constructor.
     *
     * @param  MemberRepository  $memberRepo
     * @param  DepartmentRepository  $departmentRepository
     */
    public function __construct(MemberRepository $memberRepo, DepartmentRepository $departmentRepository)
    {
        //run the
        if(!Schema::hasColumn('users'   ,  'member_id')){

            DB::statement("ALTER TABLE  users ADD  COLUMN member_id TEXT");

        }


        $this->memberRepository = $memberRepo;
        $this->departmentRepo = $departmentRepository;
    }

    /**
     * Display a listing of the Member.
     *
     * @return Factory|View
     *
     * @throws Exception
     */
    public function index()
    {
        $departments = $this->departmentRepo->getDepartmentsList();
        $memberStatus = User::STATUS_ARR;

        return view('members.index', compact('departments', 'memberStatus'));
    }

    /**
     * Show the form for creating a new Member.
     *
     * @return Factory|View
     */
    public function create()
    {
        $data = $this->memberRepository->getLanguageList();
        $departments = $this->departmentRepo->getDepartmentsList();
        $permissionsArr = Permission::where('type', '!=', 'Contacts')->get()->groupBy('type');

        return view('members.create', compact('data', 'departments', 'permissionsArr'));
    }

    /**
     * Store a newly created Member in storage.
     *
     * @param  CreateUserRequest  $request
     * @return RedirectResponse|Redirector
     *
     * @throws ApiOperationFailedException
     * @throws Throwable
     */
    public function store(CreateUserRequest $request)
    {


        $input = $request->all();
        $input['send_welcome_email'] = (isset($input['send_welcome_email']) && ! empty($input['send_welcome_email'])) ? 1 : 0;
        $input['staff_member'] = (isset($input['staff_member']) && ! empty($input['staff_member'])) ? 1 : 0;
        $this->memberRepository->store($input);

        Flash::success(__('messages.member.member_saved_successfully'));

        return redirect(route('members.index'));
    }

    /**
     * Display the specified Member.
     *
     * @param  User  $member
     * @return Application|Factory|\Illuminate\Contracts\View\View|RedirectResponse
     */
    public function show(User $member)
    {
        $groupName = (request('group') == null) ? 'member_details' : request('group');
        $data['groupName'] = $groupName;

        $member = $this->memberRepository->prepareCustomerData($member);

   /*      if (getLoggedInUser()->hasRole('staff_member') && $member->is_admin) {
            return redirect()->back();
        } */

        $memberPermissions = $member->permissions()->get()->groupBy('type');

        $data['status'] = Task::STATUS;
        $data['priorities'] = Task::PRIORITY;

        return view("members.views.$groupName", compact('member', 'memberPermissions'))->with($data);
    }

    /**
     * Show the form for editing the specified Member.
     *
     * @param $id
     * @return Application|Factory|\Illuminate\Contracts\View\View|RedirectResponse
     */
    public function edit($id)
    {
        $member = User::with('media')->findOrFail($id);

     /*    if (getLoggedInUser()->hasRole('staff_member') && $member->is_admin) {
            return redirect()->back();
        } */

        $data = $this->memberRepository->getLanguageList();
        $departments = $this->departmentRepo->getDepartmentsList();
        $permissionsArr = Permission::where('type', '!=', 'Contacts')->get()->groupBy('type');
        $memberPermissions = $member->permissions()->pluck('id')->toArray();

        return view('members.edit', compact('member', 'data', 'departments', 'permissionsArr', 'memberPermissions'));
    }

    /**
     * Update the specified Member in storage.
     *
     * @param  UpdateUserRequest  $request
     * @param  User  $member
     * @return RedirectResponse|Redirector
     *
     * @throws Throwable
     */
    public function update(UpdateUserRequest $request, User $member)
    {
        $input = $request->all();
        $input['send_welcome_email'] = (isset($input['send_welcome_email']) && ! empty($input['send_welcome_email'])) ? 1 : 0;
        $input['staff_member'] = (isset($input['staff_member']) && ! empty($input['staff_member'])) ? 1 : 0;
        $this->memberRepository->updateMember($member->id, $input);

        Flash::success(__('messages.member.member_updated_successfully'));

        return redirect(route('members.index'));
    }

    /**
     * Remove the specified Member from storage.
     *
     * @param  User  $member
     * @return JsonResponse
     *
     * @throws Exception
     */
    public function destroy(User $member): JsonResponse
    {
        if ($member->email == Auth::user()->email) {
            return $this->sendError('Login member can\'t deleted.');
        }

        DB::setDefaultConnection('cal');

        $member->delete();
        DB::setDefaultConnection('mysql');

        $member->proposal()->delete();
        $member->goals()->detach();
        $member->projects()->delete();
        $member->delete();

        //delete also from cal


        activity()->performedOn($member)->causedBy(getLoggedInUser())
            ->useLog('Member deleted.')->log($member->full_name.' Member deleted.');

        return $this->sendSuccess('Member deleted successfully.');
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function activeDeActiveAdministrator($id): JsonResponse
    {
        $member = User::find($id);
        $member->update(['is_enable' => ! $member->is_enable]);

        return $this->sendSuccess(__('messages.member.member_status_updated_successfully'));
    }

    /**
     * @param  User  $member
     * @return JsonResponse
     *
     * @throws Exception
     */
    public function resendEmailVerification(User $member): JsonResponse
    {
        $member->sendEmailVerificationNotification();

        return $this->sendSuccess(__('messages.member.verification_mail_has_been_sent'));
    }

    /**
     * @param  User  $member
     * @return mixed
     */
    public function emailVerified(User $member)
    {
        $member->update(['email_verified_at' => Carbon::now()]);

        return $this->sendSuccess(__('messages.member.email_verified_successfully'));
    }

    /**
     * @param $userId
     * @return RedirectResponse
     */
    public function impersonate($userId): RedirectResponse
    {
        if ((getLoggedInUser()->hasRole('client')) || session('impersonated_by')) {
            return redirect()->back();
        }

        $user = User::find($userId);
        getLoggedInUser()->impersonate($user);

        return redirect()->route('dashboard');
    }

    /**
     * @return RedirectResponse
     */
    public function impersonateLeave(): RedirectResponse
    {
        getLoggedInUser()->leaveImpersonation();

        return redirect()->route('dashboard');
    }
}
