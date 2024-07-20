<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEstimateRequest;
use App\Http\Requests\UpdateEstimateRequest;
use App\Models\Address;
use App\Models\Country;
use App\Models\Estimate;
use App\Models\EstimateAddress;
use App\Models\Setting;
use App\Models\Task;
use App\Repositories\EstimateRepository;
use Barryvdh\DomPDF\Facade as PDF;
use Exception;
use Flash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;
use Illuminate\Support\Str;

class EstimateController extends AppBaseController
{
    /** @var EstimateRepository */
    private $estimateRepository;

    public function __construct(EstimateRepository $estimateRepo)
    {
        $this->estimateRepository = $estimateRepo;

        if(!Schema::hasColumn('estimate_addresses' ,  'billing_id')){
            DB::statement("ALTER TABLE  estimate_addresses ADD COLUMN billing_id  INTEGER");



        }

        if(!Schema::hasColumn('estimate_addresses' ,  'latlog')){
            DB::statement("ALTER TABLE  estimate_addresses ADD COLUMN latlog  TEXT");
            DB::statement("ALTER TABLE  estimate_addresses ADD COLUMN mapaddress  TEXT");

        }



        if(!Schema::hasColumn('estimate_addresses' ,  'locality')){
            DB::statement("ALTER TABLE  estimate_addresses ADD COLUMN locality  TEXT");


        }



        if(!Schema::hasColumn('estimates' ,  'discount_approved')){
            DB::statement("ALTER TABLE  estimates ADD COLUMN discount_approved  INTEGER");

        }


        if(!Schema::hasColumn('estimates' ,  'is_admin')){
            DB::statement("ALTER TABLE  estimates ADD COLUMN is_admin  INTEGER  DEFAULT(0)");

        }


    }

    /**
     * Display a listing of the Estimate.
     *
     * @return Factory|View
     */



     public function approve($id){


        if(auth()->user()->is_admin  == 1 ){

       $estimate = Estimate::find($id);
        $estimate->discount_approved  =     1 ;
     //do the calculation before saving .
     $discount  =   $estimate->discount / 100  ;

     $total_discount   =   $estimate->total_amount  *     $discount;

     $total  =   $estimate->total_amount  -    $total_discount   ;
     $estimate->total_amount   =  $total;
       $estimate->save();



        $estimate->save();
        return  back()->with(['success' =>  "Discount Approved"]);
        }
        //return to the details with a message
        return  back()->with(['error' =>  "Failed"]);

     }


     public function reject($id){




        if(auth()->user()->is_admin  == 1 ){


        $estimate = Estimate::find($id);
        $estimate->discount_approved  =    0 ;
        $estimate->save();

        return  back()->with(['success' =>  "Discount Rejected"]);

        }
        return  back()   ;

     }

    public function index()
    {
        $statusArr = Estimate::STATUS;

        return view('estimates.index', compact('statusArr'));
    }

    /**
     * Show the form for creating a new Estimate.
     *
     * @param  null  $customerId
     * @return Factory|View
     */
    public function create($customerId = null)
    {
        $data = $this->estimateRepository->getSyncList();
        $settings = Setting::pluck('value', 'key');

      //get the user details  .




        return view('estimates.create', compact('data', 'customerId', 'settings'));
    }

    /**
     * Store a newly created Estimate in storage.
     *
     * @param  CreateEstimateRequest  $request
     * @return JsonResponse
     */
    public function store(CreateEstimateRequest $request)
    {


        //try {
            DB::beginTransaction();
            $input = $request->all();

            if (array_sum($input['quantity']) > 9999999) {
                return $this->sendError(__('messages.common.quantity_is_not_greater_than'));
            }

            $estimate = $this->estimateRepository->store($input);
            DB::commit();

            Flash::success(__('messages.estimate.estimate_saved_successfully'));

            return $this->sendResponse($estimate, __('messages.estimate.estimate_saved_successfully'));
       /*  } catch (Exception $e) {
            DB::rollBack();

            return $this->sendError($e->getMessage());
        } */
    }

    /**
     * Display the specified Estimate.
     *
     * @param  Estimate  $estimate
     * @return Factory|View
     */


     public function update_address($estimate, $address   , Request $request){
        $input  = $request->all();
        $input['country'][1] = ($input['country'][1]  ==  2) ? "Gozo" : "Malta";
        $input['country'][2] = ($input['country'][2]  ==  2)  ? "Gozo" : "Malta";
        $address_id =  $address  ;
    $this->estimateRepository->update_address($input , $address_id);
    Flash::success('Address Updated Successfully');

    return redirect(route('estimates.edit'  , [$estimate ]));

    }


    public function deleteaddress($id){

     $billing  =  EstimateAddress::find($id);
     $shipping  =  EstimateAddress::where('billing_id'  ,  $billing->id)->first();
     if(isset($shipping->id )){
       $shipping->delete();
     }
     $billing ->delete();
     return back();

    }

    public function show(Estimate $estimate)
    {
        $estimate = $this->estimateRepository->getSyncForEstimateDetail($estimate->id);
        $status = Task::STATUS;
        $priorities = Task::PRIORITY;
        $groupName = (request('group') == null) ? 'estimate_details' : (request('group'));

        return view("estimates.views.$groupName", compact('estimate', 'status', 'priorities', 'groupName'));
    }

    /**
     * Show the form for editing the specified Estimate.
     *
     * @param  Estimate  $estimate
     * @return Application|Factory|\Illuminate\Contracts\View\View|RedirectResponse
     */


     public function edit_address($estimate , $address){
        //get the two details here
        $data['countries'] = Country::orderBy('name', 'asc')->pluck('name', 'id')->toArray();
        $data['billingAddress']  = EstimateAddress::find($address);
        $data['shippingAddress']  = EstimateAddress::where('billing_id'  , $data['billingAddress']->id)->first();
        $estimate_d  = Estimate::find($estimate);
        //customer details
        return view('estimates.edit_address', compact('data' ,  'estimate_d'));



    }


    public function edit(Estimate $estimate)
    {
        $estimate = Estimate::with('salesItems.taxes')->findOrFail($estimate->id);
        if ($estimate->status == Estimate::STATUS_EXPIRED || $estimate->status == Estimate::STATUS_DECLINED) {
            return redirect()->back();
        }

        $data = $this->estimateRepository->getSyncList();
        $addresses = [];

        foreach ($estimate->estimateAddresses as $index => $address) {
            $addresses[$index] = $address;
        }

        return view('estimates.edit', compact('data', 'estimate', 'addresses'));
    }

    /**
     * Update the specified Estimate in storage.
     *
     * @param  Estimate  $estimate
     * @param  UpdateEstimateRequest  $request
     * @return JsonResponse
     */
    public function update(Estimate $estimate, UpdateEstimateRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->all();

            if (array_sum($input['quantity']) > 9999999) {
                return $this->sendError(__('messages.common.quantity_is_not_greater_than'));
            }

            $estimate = $this->estimateRepository->update($input, $estimate);
            DB::commit();

            Flash::success(__('messages.estimate.estimate_updated_successfully'));

            return $this->sendResponse($estimate, __('messages.estimate.estimate_updated_successfully'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Remove the specified Estimate from storage.
     *
     * @param  Estimate  $estimate
     * @return JsonResponse
     */
    public function destroy(Estimate $estimate)
    {
        try {
            DB::beginTransaction();
            $this->estimateRepository->deleteEstimate($estimate);
            DB::commit();

            return $this->sendSuccess('Estimate deleted successfully.');
        } catch (Exception $e) {
            DB::rollBack();

            return $this->sendError($e->getMessage());
        }
    }

    /**
     * @param  Estimate  $estimate
     * @param  Request  $request
     * @return mixed
     */
    public function changeStatus(Estimate $estimate, Request $request)
    {
        $this->estimateRepository->changeEstimateStatus($estimate->id, $request->get('status'));

        return $this->sendSuccess(__('messages.estimate.estimate_status_updated_successfully'));
    }

    /**
     * @param  Estimate  $estimate
     * @return Factory|View
     */
    public function viewAsCustomer(Estimate $estimate)
    {
        $estimate = $this->estimateRepository->getSyncForEstimateDetail($estimate->id);
        $totalPaid = 0;

        $settings = Setting::pluck('value', 'key')->toArray();

        return view('estimates.view_as_customer', compact('estimate', 'totalPaid', 'settings'));
    }

    /**
     * @param  Estimate  $estimate
     * @return mixed
     */
    public function convertToPdf(Estimate $estimate)
    {
        $estimate = $this->estimateRepository->getSyncForEstimateDetail($estimate->id);
        $totalPaid = 0;

        $settings = Setting::pluck('value', 'key')->toArray();

        $pdf = PDF::loadView('estimates.estimate_pdf', compact(['estimate', 'totalPaid', 'settings']));

        return $pdf->download(__('messages.estimate.estimate_prefix').$estimate->estimate_number.'.pdf');
    }

    /**
     * @param  Estimate  $estimate
     * @return JsonResponse
     */
    public function convertToInvoice(Estimate $estimate)
    {
        $invoice = $this->estimateRepository->convertToInvoice($estimate);

        return $this->sendResponse($invoice, __('messages.estimate.convert_estimate_to_invoice'));
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

            $bill_map_address  =   isset($bill_address->mapaddress) ?  $bill_address->mapaddress   :  ' ';
            $bill_street  =   isset($bill_address->street) ?  $bill_address->street   :  ' ';
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
              Street  :   $bill_map_address   <br/>
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
