<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Job;
use App\Models\project;
use App\Models\project_installation;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Laracasts\Flash\Flash;

class Installation_controller extends Controller
{
    //


    public function __construct()
    {

          if(!Schema::hasColumn('invoices' , 'installation_date' )){
        DB::statement('ALTER TABLE invoices ADD COLUMN  installation_date   TEXT');

          }

            if(!Schema::hasColumn('invoices' , 'employees' )){
        DB::statement('ALTER TABLE invoices ADD COLUMN  employees  TEXT');

          }
      if(!Schema::hasColumn('invoices' , 'lat' )){
        DB::statement('ALTER TABLE invoices ADD COLUMN  lat  TEXT');

          }
     if(!Schema::hasColumn('invoices' , 'longitude' )){
        DB::statement('ALTER TABLE invoices ADD COLUMN  longitude  TEXT');

          }
    if(!Schema::hasColumn('invoices' , 'address' )){
        DB::statement('ALTER TABLE invoices ADD COLUMN  address  TEXT');

          }
    if(!Schema::hasColumn('invoices' , 'map' )){
        DB::statement('ALTER TABLE invoices ADD COLUMN map  TEXT');

          }

 $this->middleware('admin_permission');


    }

    public function new_projects()
    {







        $paymentStatuses = Invoice::PAYMENT_STATUS;

        $status = 0 ;
        $title = "New";

        return view('installation.index', compact('paymentStatuses'  , 'status' , 'title'));
    }


    public function assigned_projects()
    {



        $paymentStatuses = Invoice::PAYMENT_STATUS;

        $status = 1 ;
        $title = "Assigned";

        return view('installation.index', compact('paymentStatuses'  , 'status'  , 'title'));
    }


    public function finished_projects()
    {




        $paymentStatuses = Invoice::PAYMENT_STATUS;

        $status = 2 ;
        $title = "Finished";

        return view('installation.index', compact('paymentStatuses'  , 'status' , 'title'));
    }




public function  assign($id){

    //new User();
    //send the invoice details

    $invoice   = Invoice::find($id);

    return view('installation.create'  ,  ['id'=>$id   ,  'invoice'=>$invoice]);


}


public function save(Request $request){




//savew direectly.
$save = Invoice::find($request->invoice_id);
//$save = new project_installation();

$lat = 35.892423;
$long = 14.440963;
if ($request->lat != 0) {

    if ($request->lat != NULL) {
        $output = str_replace("(", "",  $request->lat);
        $output = str_replace(")", "",  $output);
        $output = str_replace("LatLng", "",  $output);
        //now explode

        $output =    explode(",", $output);
        $lat = $output[0];
        $long = $output[1];
    }
}


$save->installation_date =   $request->installation_date ;
$save->lat =   $lat ;
$save->longitude =   $long ;

$save->job_done  = 1 ;
$save->map  = $request->lat ;
$save->address  = $request->address ;
//for the employeess
$save->employees =  $request->worker;

$save->save();


//save the job here ..

$save_job  = new Job();
$save_job->invoice_id  = $request->invoice_id ;
$save_job->invoice_name  = $save->title;

$save_job->installation_date =  $request->installation_date;

$save_job->save();

//now update the invoice
Flash::success('Assigned Project Successfully');

//send emails to the employees here

return   redirect( route('assign.projects'))->with(['success'=> 'save']);

}

}
