<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Customer;
use App\Models\CustomerGroup;
use App\Models\Invoice;
use App\Models\Job;
use App\Models\jobreminder;
use App\Models\Product;
use App\Queries\JobDataTable;
use App\Repositories\JobRepository;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends AppBaseController
{
    //

    private $serviceRepository;
    public function __construct(JobRepository $serviceRepo)
{
    //create the table.

  if (!Schema::hasTable('jobs')) {
    Schema::create('jobs', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->text('installation_date')->nullable();
        $table->string('address')->nullable();
        $table->string('map_cordinate')->nullable();
        $table->string('google_map')->nullable();
        $table->string('product_name')->nullable();
        $table->integer('product_id')->nullable();
        $table->integer('customer_id')->nullable();
        $table->string('customer_name')->nullable();
        $table->string('invoice_name')->nullable();
        $table->string('country')->nullable();
        $table->string('locality')->nullable();
        $table->string('lat')->nullable();
        $table->string('long')->nullable();
        $table->longText('invoice_id')->nullable();
        $table->timestamps();
    });



}


  if (!Schema::hasTable('jobreminders')) {
    Schema::create('jobreminders', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->longtext('subject')->nullable();
        $table->longtext('message')->nullable();
        $table->longtext('date')->nullable();
        $table->integer('job_id')->nullable();
        $table->integer('active')->nullable();
        $table->timestamps();
    });

}



        $this->serviceRepository = $serviceRepo;
    }



public function viewjob($id){
$job  =  Job::find($id);

return view('job.view'  ,  ['job'=>$job]);
}

    public function calendar(){

        $jobs  =  Invoice::where('job_done', '!='  ,  0)->get();

        return view('job.calendar' ,   ['jobs'=>$jobs]);

    }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            return DataTables::of((new JobDataTable())->get())->make(true);
        }

        $data  =  [];
        $data['countries']  =  Country::orderby('id'  ,  'desc')->get();

        $products  =  Product::orderby('id'  , 'desc')->get();
        $customers = Customer::orderby('id'  ,  'desc')->get();
        $invoice  =  Invoice::orderby('id'  ,  'desc')->get();

        $customergroup = CustomerGroup::orderby('id'  ,  'desc')->get();
        $all = array('data'=>$data  ,  'products'=>$products   ,
         'customers'=>$customers , 'customergroups'=>$customergroup  , 'invoices'=>$invoice);



        return view('job.index')->with($all);
    }

    public function store(Request $request)
    {
       //just save to the database

       $lat_user_in = 35.892423;
       $long_user_in = 14.440963;
       if ($request->user_lat_in != 0) {

           if ($request->user_lat_in != NULL) {
               $output = str_replace("(", "",  $request->user_lat_in);
               $output = str_replace(")", "",  $output);
               $output = str_replace("LatLng", "",  $output);
               //now explode

               $output =    explode(",", $output);
               $lat_user_in = $output[0];
               $long_user_in = $output[1];
           }
       }

       $save  = new Job();
       $product  =  Product::find($request->product);
        $save->product_name  =  $product->title;
       $save->product_id  =  $product->id;
       $customer  =  Customer::find($request->customer);
       $save->customer_name   =  $customer->company_name ;
       $save->customer_id   =  $customer->id ;

       $save->installation_date =  $request->installation_date;
       $save->address  =  $request->address;
       $save->lat  =   $lat_user_in   ;
       $save->long  = $long_user_in  ;
       $save->save();
        activity()->performedOn($save)->causedBy(getLoggedInUser())
            ->useLog('New Service created.')->log($save->name.' Service created.');

        return $this->sendResponse($save, __('messages.service.service_saved_successfully'));
    }



    public  function save_invoice(Request  $request){

        if(isset($request->invoices)){

            $job = Job::find($_POST['job']) ;
            //you need to add  to the array.

            $job->invoice_id  =   json_encode($request->invoices) ;

            $job->save();
        }else{

            $job = Job::find($_POST['job']) ;
            //you need to add  to the array.

            $array = [];

            $job->invoice_id  =   json_encode($array) ; ;

            $job->save();

        }

       return redirect(route('view.job'  ,  $_POST['job'] ))->with( ['success'=>"Invoice Update Successful" ]);

    }

    public function edit(Job $service)
    {
        return $this->sendResponse($service, 'Job retrieved successfully.');
    }



    public function reminder($job_id)
    {
        $service =  jobreminder::where([['job_id' ,  $job_id]]  )->first();
        return $this->sendResponse($service, 'Job retrieved successfully.');
    }




    public function update(Request $request, Job $service)
    {
        $lat_user_in = 0;
        $long_user_in = 0;
        if ($request->user_lat_in != 0) {

            if ($request->user_lat_in != NULL) {
                $output = str_replace("(", "",  $request->user_lat_in);
                $output = str_replace(")", "",  $output);
                $output = str_replace("LatLng", "",  $output);
                //now explode

                $output =    explode(",", $output);
                $lat_user_in = $output[0];
                $long_user_in = $output[1];
            }
        }
        $save  = Job::find($service->id);
        $product  =  Product::find($request->product);
         $save->product_name  =  $product->title;
        $save->product_id  =  $product->id;
        $customer  =  Customer::find($request->customer);
        $save->customer_name   =  $customer->company_name ;
        $save->customer_id   =  $customer->id ;
        $save->installation_date =  $request->installation_date;
        $save->address  =  $request->address  ;
        if( $lat_user_in !=  0){
        $save->lat  =   $lat_user_in   ;
       $save->long  = $long_user_in  ;
        }
        $save->save();

        activity()->performedOn($save)->causedBy(getLoggedInUser())
        ->useLog('Service updated.')->log($save->serial_no.' Service updated.');

        return $this->sendSuccess(__('messages.service.service_updated_successfully'));


    }


    public function save_reminder(Request $request  ,  $id){

            if($id  ==  0){
                    $save  =  new jobreminder();
            }else{

                $save =  jobreminder::find($id);

            }

            $save->subject  =  $request->subject  ;
            $save->message  =  $request->message  ;
            $save->date  =  $request->date  ;
            $save->job_id  =  $request->job_id  ;
            if(isset($request->active)){
            $save->active =  1;
            }else{

                $save->active =  0;
            }

            $save->save();

            activity()->performedOn($save)->causedBy(getLoggedInUser())
            ->useLog('Service updated.')->log($save->id.' Service updated.');

            return $this->sendSuccess("Reminder Message Set");


    }

    public function destroy(Job $service)
    {
        $del  = Job::find($service->id);


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
