<?php

namespace App\Http\Controllers;

use App\Models\installation_note;
use App\Models\Invoice;
use App\Models\SalesItem;
use App\Models\PredefinedReply;
use App\Repositories\InvoiceRepository;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Laracasts\Flash\Flash;

class start_installation extends Controller
{
    //
    private $invoiceRepository;

    public function  __construct(InvoiceRepository $invoiceRepo)
    {
        $this->invoiceRepository = $invoiceRepo;

        if (!Schema::hasColumn('sales_items', 'warranty')) {
            DB::statement("ALTER TABLE  sales_items  ADD COLUMN warranty TEXT");
        }


        if (!Schema::hasColumn('sales_items', 'serial_no')) {
            DB::statement("ALTER TABLE  sales_items  ADD COLUMN serial_no TEXT");
        }

        if (!Schema::hasColumn('sales_items', 'warranty_type')) {
            DB::statement("ALTER TABLE  sales_items  ADD COLUMN warranty_type TEXT");
        }


        if (!Schema::hasColumn('invoices', 'warranty')) {
            DB::statement("ALTER TABLE  invoices  ADD COLUMN warranty INTEGER");
        }
        if (!Schema::hasColumn('invoices', 'progress')) {
            DB::statement("ALTER TABLE  invoices  ADD COLUMN progress INTEGER");
        }

        if (!Schema::hasColumn('invoices', 'start_date')) {
            DB::statement("ALTER TABLE  invoices  ADD COLUMN start_date  DATETIME");
        }

        if (!Schema::hasColumn('invoices', 'pause_date')) {
            DB::statement("ALTER TABLE  invoices  ADD COLUMN pause_date  DATETIME");
        }

        if (!Schema::hasColumn('invoices', 'resume_date')) {
            DB::statement("ALTER TABLE  invoices  ADD COLUMN resume_date  DATETIME");
        }

        if (!Schema::hasColumn('invoices', 'end_date')) {
            DB::statement("ALTER TABLE  invoices  ADD COLUMN end_date   DATETIME");
        }

        if( !Schema::hasTable('installation_notes')  )	  {
            Schema::create('installation_notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('invoice_id')->nullable();
            $table->longText('note')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
                });}


        if (!Schema::hasColumn('installation_notes', 'predefined_value')) {
            DB::statement("ALTER TABLE installation_notes  ADD COLUMN predefined_value   TEXT");
            DB::statement("ALTER TABLE installation_notes  ADD COLUMN predefined_label   TEXT");
        }




    }





    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image', // Allow all image types and set a max file size.
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);

            //save the  image here .
            $save  = SalesItem::find($request->id);
            $save->image  =  '/uploads/' . $imageName  ;
            $save->save();
            return response()->json(['image_path' => '/uploads/' . $imageName]);
        }

        return response()->json(['error' => 'No image uploaded.']);
    }

    public function serial(Request $request)
    {
            //save the  image here .
            $save  = SalesItem::find($request->id);
            $save->serial_no  =  $request->serial_no  ;
            $save->save();
            return response()->json(['message' => 'Successful']);

        return response()->json(['error' => 'No image uploaded.']);
    }


    public function  progress( $id,  $status   , Request  $request   )
    {




        $status = intval($status);
        $id  =  intval($id);

        $currentDateTime = date('Y-m-d H:i:s');
        $save  = Invoice::find($id);
        $save->progress  =  $status;
        if ($status  ==  1) {


            $save->start_date  =  $currentDateTime;
            $save->job_done  =  1;
        }

        if ($status ==  2) {
            $save->pause_date  =   $currentDateTime;

            //save the  note if available

            if(isset( $request->note) ){

                if(!empty($request->note)){

                    //save the note okay and  be specific with type
                    $save_note = new  installation_note();
                    $save_note->note  = $request->note  ;
                    $save_note->invoice_id = $id  ;
                    $save_note->type  =  "Pause Installation  Note";
                    $save_note->save() ;



                }


            }


        }

        if ($status ==  3) {
            $save->resume_date  =   $currentDateTime;


        }

        if ($status ==  4) {
            $save->end_date  =   $currentDateTime;
            $save->job_done  =  2;



            if(isset( $request->note) ){

                if(!empty($request->note)){




                    //save the note okay and  be specific with type
                    $save_note = new  installation_note();
                    $save_note->note  = $request->note  ;
                    if($_POST['predefined_value']  !=  ""){

                    $save_note->predefined_value = json_encode($_POST['predefined_value']  ,  true);
                    $save_note->predefined_label = json_encode($_POST['predefined_label']  ,  true);


                    }

                    $save_note->invoice_id = $id  ;
                    $save_note->type  =  "End Installation  Note";
                    $save_note->save() ;



                }


            }
        }
        $save->save();

        if(isset($save_note->id)){

            $data = [

                'id' => $save_note->id ,
                'message' => 'done',
                'data' =>  $save_note

                // Add more data as needed
            ];




        }else{


            $data = [
                'id' => 0 ,
                'message' => 'done',

                // Add more data as needed
            ];


        }

        return response()->json($data);

        return  "done";
    }

    public function  delete_note($id){

        $note  =  installation_note::find($id);
        $note->delete();

  return  back();



    }

    public function assigned_projects()
    {
        $paymentStatuses = Invoice::PAYMENT_STATUS;

        $status = 1;
        $title = "Assigned";

        return view('start_installation.index', compact('paymentStatuses', 'status', 'title'));
    }


    public function finished_projects()
    {
        $paymentStatuses = Invoice::PAYMENT_STATUS;

        $status = 2;
        $title = "Finished";

        return view('start_installation.index', compact('paymentStatuses', 'status', 'title'));
    }




    public function jobs()
    {
        $paymentStatuses = Invoice::PAYMENT_STATUS;

        $status = 2;
        $title = "Finished";

        return view('start_installation.index', compact('paymentStatuses', 'status', 'title'));
    }



    public function  view($id)
    {
        //send the invoice details
        $invoice   = Invoice::find($id);
        //get all the note okay
        $notes  =  installation_note::where('invoice_id'  ,  $id)->orderby('id', 'desc')->get();
        $fields  = PredefinedReply::orderby('id' ,  'desc')->get();
        return view('start_installation.create',  ['id' => $id,  'invoice' => $invoice  ,
         'notes'=>$notes ,  'fields'=>$fields ]);
    }


    //invoices editing here .,


    public function edit_invoice(Invoice $invoice)
    {
        //update the invoice now ok

        $update = Invoice::find($invoice->id);

        if (auth()->user()->is_admin  ==  0) {

            if ($update->employees != auth()->user()->id) {

                // return redirect()->back();
            }
        }



        if ($invoice->payment_status == Invoice::STATUS_PAID || $invoice->payment_status == Invoice::STATUS_PARTIALLY_PAID || $invoice->payment_status == Invoice::STATUS_CANCELLED) {
            //return redirect()->back();
        }

        $data = $this->invoiceRepository->getSyncList();
        $invoice = $this->invoiceRepository->getSyncListForInvoiceDetail($invoice->id);
        $addresses = [];

        foreach ($invoice->invoiceAddresses as $index => $address) {
            $addresses[$index] = $address;
        }

        $who  =  'installer';

        return view('invoices.edit', compact('data', 'invoice', 'addresses',  'who'));
    }



    public function assign_warrant(Invoice $invoice)
    {
        //update the invoice now ok




        $update = Invoice::find($invoice->id);

        //check all the saleitem and make sure the serial number is not NULL
             $serial_number_empty  = false  ;

        foreach( $update->salesItems  as  $sales){


            if( $sales->serial_no  ==  NULL ){

                $serial_number_empty  =   true  ;


            }


        }

        if($serial_number_empty   ==  true){

           return back()->with(['error'  =>
           "Could you please enter all the product serial numbers? Thank you!"]);
        }


        if (auth()->user()->is_admin  ==  0) {

            if ($update->employees != auth()->user()->id) {

                // return redirect()->back();
            }
        }



      //  if ($update->warranty  == NULL  ||   $update->warranty  == -1) {


            //make the warranty active...
            $update->warranty  = 1;
            $update->save();

            //change the warranty of each of the salesitems



         foreach($update->salesItems  as  $salesitem){


            $update_sale = SalesItem::find($salesitem->id);



            if(  $salesitem->warranty   == NULL) {
             if(isset($update_sale->warrantyperiod->id)) {


                $currentDate = date('Y-m-d');
            // Add 1 year to the current date
                $year  =  $update_sale->warrantyperiod->number  ;
           $oneYearLater = date('Y-m-d', strtotime("+$year year", strtotime($currentDate)));
             //check for the warranty period..

             $update_sale->warranty  =  $oneYearLater ;

             $update_sale->save();

             }
            }

         }




     //   }



        if ($invoice->payment_status == Invoice::STATUS_PAID || $invoice->payment_status == Invoice::STATUS_PARTIALLY_PAID || $invoice->payment_status == Invoice::STATUS_CANCELLED) {
            //return redirect()->back();
        }

        $data = $this->invoiceRepository->getSyncList();
        $invoice = $this->invoiceRepository->getSyncListForInvoiceDetail($invoice->id);
        $addresses = [];

        foreach ($invoice->invoiceAddresses as $index => $address) {
            $addresses[$index] = $address;
        }

        $who  =  'installer';

        return view('invoices.edit', compact('data', 'invoice', 'addresses',  'who'));
    }



    public function save_warranty(Request  $request, $id)
    {
        $save = SalesItem::find($id);
        $save->warranty = $request->warranty;
        $save->warranty_type = $request->warranty_type;
        $save->save();


        Flash::success("Warranty Period Saved");

        return back();
    }
}
