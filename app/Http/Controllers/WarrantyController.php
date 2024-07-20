<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Country;
use App\Models\Customer;
use App\Models\CustomerGroup;
use App\Models\Product;
use App\Models\ProductGroup;
use App\Models\Warranty;
use App\Models\Ticket;

use App\Queries\WarrantyDataTable;
use App\Repositories\WarrantyRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WarrantyController extends AppBaseController
{
    /** @var ServiceRepository */
    private $serviceRepository;

    public function __construct(WarrantyRepository $serviceRepo)
{
    //create the table.

  if (!Schema::hasTable('warranties')) {
    Schema::create('warranties', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('serial_no')->nullable();
        $table->string('customer_group')->nullable();
        $table->integer('customer_group_id')->nullable();
        $table->string('customer')->nullable();
        $table->integer('customer_id')->nullable();
        $table->string('product')->nullable();
        $table->integer('product_id')->nullable();
        $table->string('country')->nullable();
        $table->string('locality')->nullable();
        $table->string('installation_date')->nullable();
        $table->integer('product_count')->default(0);
        $table->timestamps();
    });
}



        $this->serviceRepository = $serviceRepo;
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|View
     *
     * @throws Exception
     */

    public function index(Request $request)
    {

        if ($request->ajax()) {
            return DataTables::of((new WarrantyDataTable())->get())->make(true);
        }

        $data  =  [];
        $data['countries']  =  Country::orderby('id'  ,  'desc')->get();

        $products  =  Product::orderby('id'  , 'desc')->get();
        $customers = Customer::orderby('id'  ,  'desc')->get();

        $customergroup = CustomerGroup::orderby('id'  ,  'desc')->get();


        $all = array('data'=>$data  ,  'products'=>$products   ,
         'customers'=>$customers , 'customergroups'=>$customergroup);



        return view('warranty.index')->with($all);
    }

    /**
     * Store a newly created Service in storage.
     *
     * @param  CreateServiceRequest  $request
     * @return JsonResource
     */
    public function store(Request $request)
    {
       //just save to the database

       $save  = new Warranty();
       $save->serial_no   = $request->serial_no;
       $product  =  Product::find($request->product);
       /* $save->product  =  $product->title;
       $save->product_id  =  $product->id; */
       $group  =  CustomerGroup::find($request->group);
       $save->customer_group   =  $group->name ;
       $save->customer_group_id    =  $group->id;

       $customer  =  Customer::find($request->customer);
       $save->customer   =  $customer->company_name ;
       $save->customer_id   =  $customer->id ;
       $save->country   = $request->country ;
       $save->locality   = $request->locality ;
       $save->installation_date =  $request->installation_date;
       $save->save();


        activity()->performedOn($save)->causedBy(getLoggedInUser())
            ->useLog('New Service created.')->log($save->name.' Service created.');

        return $this->sendResponse($save, __('messages.service.service_saved_successfully'));
    }

    /**
     * Show the form for editing the specified Service.
     *
     * @param  Service  $service
     * @return JsonResource
     */
    public function edit(Warranty $service)
    {
        return $this->sendResponse($service, 'Warranty retrieved successfully.');
    }

    /**
     * Update the specified Service in storage.
     *
     * @param  UpdateServiceRequest  $request
     * @param  Service  $service
     * @return JsonResource
     */
    public function update(Request $request, Warranty $service)
    {

        $save  =  Warranty::find($service->id);
        $save->serial_no   = $request->serial_no;
        $product  =  Product::find($request->product);
        /* $save->product  =  $product->title;
        $save->product_id  =  $product->id; */
        $group  =  CustomerGroup::find($request->group);
        $save->customer_group   =  $group->name ;
        $save->customer_group_id    =  $group->id;

        $customer  =  Customer::find($request->customer);
        $save->customer   =  $customer->company_name ;
        $save->customer_id   =  $customer->id ;
        $save->country   = $request->country ;
        $save->locality   = $request->locality ;
        $save->installation_date =  $request->installation_date;
        $save->save();


        activity()->performedOn($save)->causedBy(getLoggedInUser())
            ->useLog('Service updated.')->log($save->serial_no.' Service updated.');

        return $this->sendSuccess(__('messages.service.service_updated_successfully'));
    }

    /**
     * Remove the specified Service from storage.
     *
     * @param  Service  $service
     * @return JsonResource
     *
     * @throws Exception
     */
    public function destroy(Warranty $service)
    {
        $del  = Warranty::find($service->id);


     /*    $ticketServiceId = Ticket::where('service_id', '=', $service->id)->exists();

        if ($ticketServiceId) {
            return $this->sendError(__('messages.service.service_used_somewhere_else'));
        }
 */
        activity()->performedOn($del)->causedBy(getLoggedInUser())
            ->useLog('Service deleted.')->log($service->serial_no.' Service deleted.');

        $service->delete();

        return $this->sendSuccess('Service deleted successfully.');
    }
}
