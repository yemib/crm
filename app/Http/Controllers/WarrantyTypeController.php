<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWarrantyTypeRequest;
use App\Http\Requests\UpdateWarrantyTypeRequest;
use App\Models\Expense;
use App\Models\WarrantyType;
use App\Queries\WarrantyTypeDataTable;
use App\Repositories\WarrantyTypeRepository;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class WarrantyTypeController extends AppBaseController
{
    /** @var WarrantyTypeRepository */
    private $WarrantyTypeRepository;

    public function __construct(WarrantyTypeRepository $warrantyTypeRepo)
    {
        $this->WarrantyTypeRepository = $warrantyTypeRepo;

        if( !Schema::hasTable('warranty_types')  )	  {
            Schema::create('warranty_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
                });}
    }

    /**
     * Display a listing of the ExpenseCategory.
     *
     * @param  Request  $request
     * @return Factory|View
     *
     * @throws Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of((new WarrantyTypeDataTable())->get())->make(true);
        }

        return view('warranty_type.index');
    }

    /**
     * Store a newly created ExpenseCategory in storage.
     *
     * @param  CreateExpenseCategoryRequest  $request
     * @return JsonResponse
     */
    public function store(CreateWarrantyTypeRequest $request)
    {
        $input = $request->all();
        //check the years  and  change the  type
        $input['type']   =  "Year";
        if($request->number   >  1){

            $input['type']   =  "Years";
        }

        $warrantytype = $this->WarrantyTypeRepository->create($input);

        activity()->performedOn($warrantytype)->causedBy(getLoggedInUser())
            ->useLog('New Warranty Type created.')->log($warrantytype->number. $warrantytype->type.' Warranty Type created.');

        return $this->sendResponse($warrantytype,  'Successful');
    }

    /**
     * Show the form for editing the specified ExpenseCategory.
     *
     * @param  ExpenseCategory  $warrantytype
     * @return JsonResponse
     */
    public function edit(WarrantyType $warrantytype  , $warranty)
    {
        $data  = WarrantyType::find($warranty);
        return response()->json($data);

        return $this->sendResponse($warrantytype, 'warranty Type retrieved successfully.');
    }

    /**
     * Update the specified ExpenseCategory in storage.
     *
     * @param  ExpenseCategory  $warrantytype
     * @param  UpdateExpenseCategoryRequest  $request
     * @return JsonResponse
     */
    public function update(WarrantyType $warrantytype, UpdateWarrantyTypeRequest $request)
    {
       $type  =  "Year";

        if($request->number    >  1){

            $type   =  "Years";
        }

                 $update  =  WarrantyType::find( $request->id );
                 $update->number  =  $request->number  ;
                 $update->type  =  $type ;
                 $update->save()  ;


                 return $this->sendSuccess("Warranty Updated Successfully");


    }

    /**
     * Remove the specified ExpenseCategory from storage.
     *
     * @param  ExpenseCategory  $warrantytype
     * @return JsonResponse
     */
    public function destroy(WarrantyType $warrantytype   ,  $warranty)
    {

        $warrantytype  =  WarrantyType::find($warranty);

/*
        activity()->performedOn($warrantytype)->causedBy(getLoggedInUser())
            ->useLog('Expense Category deleted.')->log($warrantytype->number.' Expense Category deleted.'); */

        $warrantytype->delete();

        return $this->sendSuccess('Warranty Type deleted successfully.');
    }
}
