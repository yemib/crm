<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Address;
use App\Models\Country;
use App\Models\Invoice;
use App\Models\InvoiceAddress;
use App\Models\Item;
use App\Models\Job;
use App\Models\Setting;
use App\Models\Task;
use App\Repositories\InvoiceRepository;
use App\Repositories\TicketRepository;
use Barryvdh\DomPDF\Facade as PDF;
use Exception;
use Flash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Laracasts\Flash\Flash as FlashFlash;
use Redirect;
use Throwable;

class InvoiceController extends AppBaseController
{
    /** @var InvoiceRepository */
    private $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepo)
    {
        $this->invoiceRepository = $invoiceRepo;

        //update all items okay

        $items  = Item::where('tax_1_id' ,  NULL)->get();

        foreach($items  as $item){

            $update  =  Item::find($item->id);
            $update->tax_1_id  =  7  ;

            $update->save();

        }

        if(!Schema::hasColumn('invoices', 'job_done')){

            DB::statement('ALTER TABLE invoices ADD COLUMN job_done INTEGER DEFAULT(0)');
        }

        if(!Schema::hasColumn('invoice_addresses' ,  'billing_id')){
            DB::statement("ALTER TABLE  invoice_addresses ADD COLUMN billing_id  INTEGER");



        }

        if(!Schema::hasColumn('invoice_addresses' ,  'latlog')){
            DB::statement("ALTER TABLE  invoice_addresses ADD COLUMN latlog  TEXT");
            DB::statement("ALTER TABLE  invoice_addresses ADD COLUMN mapaddress  TEXT");

        }



        if(!Schema::hasColumn('invoice_addresses' ,  'locality')){
            DB::statement("ALTER TABLE  invoice_addresses ADD COLUMN locality  TEXT");


        }


        if(!Schema::hasColumn('invoices' ,  'discount_approved')){
            DB::statement("ALTER TABLE  invoices ADD COLUMN discount_approved  INTEGER");

        }

        if(!Schema::hasColumn('invoices' ,  'is_admin')){
            DB::statement("ALTER TABLE  invoices ADD COLUMN is_admin  INTEGER  DEFAULT(0)");

        }

        if(!Schema::hasColumn('sales_items' ,  'warranty_period')){
            DB::statement("ALTER TABLE  sales_items ADD COLUMN warranty_period  INT");

        }



    }

    /**
     * Display a listing of the Invoice.
     *
     * @return Factory|Application|View
     */


     public function approve($id){


        if(auth()->user()->is_admin  == 1 ){

       $estimate = Invoice::find($id);
        $estimate->discount_approved  =     1 ;
     //do the calculation before saving .
   /*    $subtotal  =    $estimate->sub_total   * ($estimate->discount /  100)  ;
      $total  =  	  $estimate->total_amount    -  $subtotal  ;
      $estimate->total_amount   =  $total  ; */

      $discount  =   $estimate->discount / 100  ;

      $total_discount   =   $estimate->total_amount  *     $discount;

      $total  =   $estimate->total_amount  -    $total_discount   ;
      $estimate->total_amount   =  $total;
        $estimate->save();
        return  back()->with(['success' =>  "Discount Approved"]);
        }
        //return to the details with a message
        return  back()->with(['error' =>  "Failed"]);

     }


     public function reject($id){


        if(auth()->user()->is_admin  == 1 ){

        $estimate = Invoice::find($id);
        $estimate->discount_approved  =    0 ;
        $estimate->save();

        return  back()->with(['success' =>  "Discount Rejected"]);

        }
        return  back()   ;

     }


    public function index()
    {
        $paymentStatuses = Invoice::PAYMENT_STATUS;

        return view('invoices.index', compact('paymentStatuses'));
    }



     public function jobindex($job)
    {
        $paymentStatuses = Invoice::PAYMENT_STATUS;

        return view('invoices.index',   ['paymentStatuses'=> $paymentStatuses, 'job'=>$job]);
    }

    /**
     * Show the form for creating a new Invoice.
     *
     * @param  null  $customerId
     * @return Application|Factory|View
     */
    public function create($customerId = null)
    {
        $data = $this->invoiceRepository->getSyncList();
        $settings = Setting::pluck('value', 'key');
        //send all products
        $products  = Item::get();

        if(isset($_GET['job'])){

            $job = Job::find($_GET['job']);
            $customerId  =  $job->customer->id;

        }
        return view('invoices.create', compact('data', 'customerId', 'settings'   ,  'products'));
    }

    /**
     * Store a newly created Invoice in storage.
     *
     * @param  CreateInvoiceRequest  $request
     * @return RedirectResponse|Redirector
     *
     * @throws Throwable
     */
    public function store(CreateInvoiceRequest $request)
    {




        try {
            DB::beginTransaction();
            $input = $request->all();

            if (array_sum($input['quantity']) > 9999999) {
                return $this->sendError(__('messages.common.quantity_is_not_greater_than'));
            }

            $invoice = $this->invoiceRepository->saveInvoice($input);
            DB::commit();

            if(isset($_POST['job'])){

                $job = Job::find($_POST['job']) ;
                //you need to add  to the array.
                if($job->invoice_id != null){
                $array  =  json_decode( $job->invoice_id   , true);
                $array[] = [ $invoice->id];
                }else{
                    $array[] = [ $invoice->id];
                }

                $job->invoice_id  =   json_encode($array) ;
                $job->save();
            }

            Flash::success(__('messages.invoice.invoice_saved_successfully'));
            if(isset($_POST['job'])){
                return $this->sendResponse($invoice, "Job Invoice added successfully");
                //redirect to the view.
                    return redirect(route('view.job',  $_POST['job'] ));


            }

            return $this->sendResponse($invoice, __('messages.invoice.invoice_saved_successfully'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Display the specified Invoice.
     *
     * @param  Invoice  $invoice
     * @return Application|Factory|View
     */

     public function update_address($estimate, $address   , Request $request){
        $input  = $request->all();
        $input['country'][1] = ($input['country'][1]  ==  2) ? "Gozo" : "Malta";
        $input['country'][2] = ($input['country'][2]  ==  2)  ? "Gozo" : "Malta";
        $address_id =  $address  ;
    $this->invoiceRepository->update_address($input , $address_id);
    Flash::success('Address Updated Successfully');

    return redirect(route('invoices.edit'  , [$estimate ]));

    }


    public function deleteaddress($id){

     $billing  =  InvoiceAddress::find($id);
     $shipping  =  InvoiceAddress::where('billing_id'  ,  $billing->id)->first();
     if(isset($shipping->id )){
       $shipping->delete();
     }
     $billing ->delete();
     return back();

    }


    public function show(Invoice $invoice)
    {
        /** @var Invoice $invoice */
        $invoice = $this->invoiceRepository->getSyncListForInvoiceDetail($invoice->id);
        $paymentModes = $invoice->paymentModes->where('active', true)->pluck('name', 'id')->toArray();

        /** @var TicketRepository $ticketRepo */
        $ticketRepo = App::make(TicketRepository::class);

        $data = $ticketRepo->getReminderData($invoice->id, Invoice::class);
        $status = Task::STATUS;
        $priorities = Task::PRIORITY;
        $notes = $this->invoiceRepository->getNotesData($invoice);
        $groupName = (request('group') == null) ? 'invoice_details' : (request('group'));

        return view("invoices.views.$groupName",
            compact('invoice', 'paymentModes', 'data', 'status', 'priorities', 'notes',
                'groupName'));
    }

    /**
     * Show the form for editing the specified Invoice.
     *
     * @param  Invoice  $invoice
     * @return Application|Factory|View|RedirectResponse
     */
     public function edit_address($estimate , $address){
        //get the two details here
        $data['countries'] = Country::orderBy('name', 'asc')->pluck('name', 'id')->toArray();
        $data['billingAddress']  = InvoiceAddress::find($address);
        $data['shippingAddress']  = InvoiceAddress::where('billing_id'  , $data['billingAddress']->id)->first();
        $estimate_d  = Invoice::find($estimate);
        //customer details
        return view('invoices.edit_address', compact('data' ,  'estimate_d'));
    }

    public function edit(Invoice $invoice)
    {
        if ($invoice->payment_status == Invoice::STATUS_PAID || $invoice->payment_status == Invoice::STATUS_PARTIALLY_PAID || $invoice->payment_status == Invoice::STATUS_CANCELLED) {
            //return redirect()->back();
        }

        $data = $this->invoiceRepository->getSyncList();
        $invoice = $this->invoiceRepository->getSyncListForInvoiceDetail($invoice->id);
        $addresses = [];

        foreach ($invoice->invoiceAddresses as $index => $address) {
            $addresses[$index] = $address;
        }

        return view('invoices.edit', compact('data', 'invoice', 'addresses'));
    }

    /**
     * Update the specified Invoice in storage.
     *
     * @param  Invoice  $invoice
     * @param  UpdateInvoiceRequest  $request
     * @return JsonResponse
     *
     * @throws Throwable
     */
    public function update(Invoice $invoice, UpdateInvoiceRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->all();

            if (array_sum($input['quantity']) > 9999999) {
                return $this->sendError(__('messages.common.quantity_is_not_greater_than'));
            }

            $invoice = $this->invoiceRepository->updateInvoice($request->all(), $invoice->id);
            DB::commit();

            Flash::success(__('messages.invoice.invoice_updated_successfully'));

            return $this->sendResponse($invoice, __('messages.invoice.invoice_updated_successfully'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Remove the specified Invoice from storage.
     *
     * @param  Invoice  $invoice
     * @return JsonResponse|RedirectResponse
     *
     * @throws Throwable
     */
    public function destroy(Invoice $invoice)
    {
        try {
            DB::beginTransaction();
            $this->invoiceRepository->deleteInvoice($invoice);
            DB::commit();

            return $this->sendSuccess('Invoice deleted successfully.');
        } catch (Exception $e) {
            DB::rollBack();

            return Redirect::back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * @param  Invoice  $invoice
     * @return Application|Factory|View
     */
    public function viewAsCustomer(Invoice $invoice)
    {
        $invoice = $this->invoiceRepository->getSyncListForInvoiceDetail($invoice->id);
        $settings = Setting::pluck('value', 'key')->toArray();
        $totalPaid = 0;

        foreach ($invoice->payments as $payment) {
            $totalPaid += $payment->amount_received;
        }

        return view('invoices.view_as_customer', compact('invoice', 'totalPaid', 'settings'));
    }

    /**
     * @param  Invoice  $invoice
     * @return mixed
     */
    public function covertToPdf(Invoice $invoice)
    {
        $invoice = $this->invoiceRepository->getSyncListForInvoiceDetail($invoice->id);
        $totalPaid = 0;

        foreach ($invoice->payments as $payment) {
            $totalPaid += $payment->amount_received;
        }

        $settings = Setting::all()->pluck('value', 'key')->toArray();
        $pdf = PDF::loadView('invoices.invoice_pdf', compact(['invoice', 'settings', 'totalPaid']));

        return $pdf->download(__('messages.invoice.invoice_prefix').$invoice->invoice_number.'.pdf');
    }

    /**
     * @param  Invoice  $invoice
     * @param  Request  $request
     * @return mixed
     */
    public function changeStatus(Invoice $invoice, Request $request)
    {
        $this->invoiceRepository->changePaymentStatus($invoice->id, $request->get('paymentStatus'));

        return $this->sendSuccess('Payment status updated successfully.');
    }

    /**
     * @param  Invoice  $invoice
     * @return mixed
     */
    public function getNotesCount(Invoice $invoice)
    {
        return $this->sendResponse($invoice->notes()->count(), 'Notes count retrieved successfully.');
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function getCustomerAddress(Request $request)
    {

        //get all the addresses of customer  here....

        $addresses = getAddressOfCustomer($request->customer_id);
         //you need to return  it as a table for bill  and   shipping addresses  .
           $output  =  "";
           $count =  0  ;
         foreach($addresses as $address){

            $checked =  ($count  == 0) ? "checked"  :  "";

            $country  =  isset($address->country) ? ( ($address->country ==  2) ? "Gozo" : "Malta" ) :  ' ';

            $bill_address  =  Address::where('billing_id' , $address->id)->first();

            $bill_street  =   isset($bill_address->street) ?  $bill_address->street   :  ' ';
            $bill_map_address  =   isset($bill_address->mapaddress) ?  $bill_address->mapaddress   :  ' ';
            $bill_locality  =  isset($bill_address->locality) ?  $bill_address->locality  : ' ';
            $bill_country  =  isset($bill_address->country) ? ( ($bill_address->country ==  2) ? "Gozo" : "Malta" ) :  ' ';
            $bill_postal  =  isset( $bill_address->zip)  ?   $bill_address->zip  :  ' ';

            $output  .=
            "<div  class='col-sm-6'>

            <table  class='table left-align-table'>
                <tr>
                <th>
                <input   $checked id='selectaddress$address' type='checkbox'  style='width:15px; height :15px'
                  name='address[]'  value='$address->id' >  <a target='_blank' href='/admin/edit_address/$request->customer_id/$address->id'  class='mr-3 addressModalIcon'><i
                class='fa fa-edit'></i></a> <label  for='selectaddress$address'> Sales Order to </label> :
                  </th>
                  <th >
                  <label   for='selectaddress$address'>   Delivery to: </label>
                  </th>

                <tr>
                <td  class='break-word'>
                <p>
                <label  for='selectaddress$address'>
                House no /Name : $address->street <br/>
                 Street  : $address->mapaddress <br/>
                 Locality  :  $address->locality
                 <br/>
                 Region  :  $country
                 <br/>
                 Postal Code  :  $address->zip
                  </p>
            </label>
                </td>
              <td align='left'   class='break-word'>
              <label  for='selectaddress$address'>
              <p>
              House no /Name : $bill_street <br/>
              Street  :   $bill_map_address  <br/>
              Locality  :  $bill_locality
              <br/>
              Region  :  $bill_country
              <br/>
              Postal Code  :  $bill_postal
               </p>
               </label>

              </td>
              </td>


                </tr>

                 </table>

              </div>";

              $count++;

         }



   /*      if (! empty($address[0])) {
            $address[0]->country = $address[0]->country != null ? $address[0]->addressCountry->name : 'null';
        }
        if (! empty($address[1])) {
            $address[1]->country = $address[1]->country != null ? $address[1]->addressCountry->name : 'null';
        } */

        return $this->sendResponse($output, 'Address retrieved successfully');
    }

}
