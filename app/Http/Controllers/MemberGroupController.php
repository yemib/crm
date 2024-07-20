<?php
namespace App\Http\Controllers;
use App\Http\Requests\CreateMemberGroupRequest;
use App\Http\Requests\UpdateMemberGroupRequest;
use App\Models\MemberGroup;
use App\Queries\MemberGroupDataTable;
use App\Repositories\MemberGroupRepository;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Throwable;
use Yajra\DataTables\DataTables;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MemberGroupController extends AppBaseController
{
    /**
     * @var MemberGroupRepository
     */
    private $memberGroupRepository;

    /**
     * MemberGroupController constructor.
     *
     * @param  MemberGroupRepository  $memberGroupRepo
     */
    public function __construct(MemberGroupRepository $memberGroupRepo)
    {
     //create the table for member groups here. 
     if( !Schema::hasTable('member_groups')  )	  { 
        Schema::create('member_groups', function (Blueprint $table) {
                $table->bigIncrements('id');
     
        $table->string('name')->nullable(); 
            $table->string('description')->nullable(); 
           
                $table->timestamps();
            });}

     if( !Schema::hasTable('member_to_member_groups')  )	  { 
        Schema::create('member_to_member_groups', function (Blueprint $table) {
                $table->bigIncrements('id');
     
        $table->integer('user_id'); 
            $table->string('member_group_id')->nullable(); 
           
                $table->timestamps();
            });}

/*             
    if(!Schema::hasColumn('users'  ,  'member_group_id')){

        DB::statement("ALTER TABLE users ADD COLUMN  member_group_id INTEGER");

    } */

        $this->memberGroupRepository = $memberGroupRepo;
    }



    /**
     * Display a listing of the Member Group.
     *
     * @param  Request  $request
     * @return Factory|View
     *
     * @throws Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of((new MemberGroupDataTable())->get())->make(true);
        }

        return view('member-groups.index');
    }

    /**
     * Show the form for editing the specified Member Group.
     *
     * @param  MemberGroup  $memberGroup
     * @return mixed
     */
    public function edit(MemberGroup $memberGroup)
    {
        return $this->sendResponse($memberGroup, 'Member Group retrieved successfully.');
    }

    /**
     * Update the specified Member Group in storage.
     *
     * @param  MemberGroup  $memberGroup
     * @param  UpdateMemberGroupRequest  $request
     * @return JsonResponse
     *
     * @throws Throwable
     */
    public function update(MemberGroup $memberGroup, UpdateMemberGroupRequest $request)
    {
        $input = $request->all();

        DB::beginTransaction();
        try {
            $memberGroup = $this->memberGroupRepository->update($input, $memberGroup->id);
            activity()->causedBy(getLoggedInUser())
                ->performedOn($memberGroup)
                ->useLog('Member Group updated.')
                ->log($memberGroup->name.' Member Group updated.');

            DB::commit();

            return $this->sendSuccess('Member Group Updated Successfully');
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * Store a newly created Member Group in storage.
     *
     * @param  CreateMemberGroupRequest  $request
     * @return void
     *
     * @throws Throwable
     */
    public function store(CreateMemberGroupRequest $request)
    {
        $input = $request->all();

        DB::beginTransaction();
        try {
            $memberGroup = $this->memberGroupRepository->create($input);
            activity()->causedBy(getLoggedInUser())
                ->performedOn($memberGroup)
                ->useLog('New Member Group created.')
                ->log($memberGroup->name.' Member Group created.');

            DB::commit();

            return $this->sendResponse($memberGroup,"Member Group Saved Successfully");
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * Remove the specified Member Group from storage.
     *
     * @param  MemberGroup  $memberGroup
     * @return JsonResponse
     *
     * @throws Exception
     */
    public function destroy(MemberGroup $memberGroup)
    {
        activity()->causedBy(getLoggedInUser())
            ->performedOn($memberGroup)
            ->useLog('Member Group deleted.')
            ->log($memberGroup->name.' Member Group deleted.');

        $memberGroup->delete();

        return $this->sendSuccess('Member Group deleted successfully.');
    }
}
