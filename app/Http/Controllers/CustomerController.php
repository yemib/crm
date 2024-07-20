<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Address;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Task;
use App\Models\User;
use App\Repositories\CustomerRepository;
use Exception;
use Flash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class CustomerController extends AppBaseController
{
    /** @var CustomerRepository */
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepo)
    {

        try{


            if(!Schema::hasColumn('addresses'  , 'billing_id' )) {

            DB::statement('ALTER TABLE addresses ADD billing_id INTEGER');
            }

            if(!Schema::hasColumn('addresses'  , 'mapaddress' )) {

            DB::statement('ALTER TABLE addresses ADD mapaddress TEXT');
            }


            if(!Schema::hasColumn('addresses'  , 'latlog' )) {

            DB::statement('ALTER TABLE addresses ADD latlog TEXT');
            }






            if(!Schema::hasColumn('customers'  , 'client_name' )) {

            DB::statement('ALTER TABLE customers ADD client_name TEXT');
            }





        }catch(\Exception){

        }

        $this->customerRepository = $customerRepo;
    }

    /**
     * Display a listing of the Customer.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('customers.index');
    }


    public function store_adddress(  $customer  ,Request $request  ){

        //return($customer);
        //return($customer);

        $input = $request->all();
        $this->customerRepository->save_addrress($request->all(), $customer);
        Flash::success(__('messages.customer.customer_saved_successfully'));

        return redirect(route('customers.edit'  , [$customer ]));


    }

    public function edit_address($customer , $address){
        $data = $this->customerRepository->getSyncList();

          $get_address  =  new  HomeController();

       

        //get the two details here
        $data['billingAddress']  =  Address::find($address);
        $data['shippingAddress']  = Address::where('billing_id'  , $data['billingAddress']->id)->first();


        //get the country name of billing addtess and  shipping address 
        $country_billing  =   Country::find($data['billingAddress']->country);
        $country_shipping =  Country::find( $data['shippingAddress']->country);

        $billing_locality = new Request();
        // Set values in the Request object
        $billing_locality ->merge(['country' =>   ( isset( $country_billing->id ) ) ?  $country_billing->name  : 'Gozo']);
        // You can add more values as needed
          $output_billing  = $get_address->getLocalities( $billing_locality , false);

         $data['billing_localities']   =  $output_billing;



         $shipping_locality = new Request();
         // Set values in the Request object
         $shipping_locality ->merge(['country' =>   ( isset(  $country_shipping->id ) ) ?   $country_shipping->name  : 'Gozo']);
         // You can add more values as needed
           $output_shipping  = $get_address->getLocalities( $shipping_locality  ,false);
 
          $data['shipping_localities']   =  $output_shipping;




     


        //customer details
        $customer  =  Customer::find($customer);

        return view('customers.edit_address', compact('data' ,  'customer'));



    }


    public function update_address($customer, $address   , Request $request){
        $input  = $request->all();
        $address_id =  $address  ;
    $this->customerRepository->update_address($input , $address_id);

    if(isset($_GET['new'])){

        Flash::success(__('messages.customer.customer_saved_successfully'));

        return redirect(route('customers.index'));

    }

    Flash::success('Address Updated Successfully');

    return redirect(route('customers.edit'  , [$customer ]));

    }

    /**
     * Show the form for creating a new Customer.
     *
     * @return Factory|View
     */
    public function create()
    {
        $data = $this->customerRepository->getSyncList();

        return view('customers.create', compact('data'));
    }

    /**
     * Store a newly created Customer in storage.
     *
     * @param  CreateCustomerRequest  $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreateCustomerRequest $request)
    {
        $input = $request->all();

      $output =   $this->customerRepository->create($input);


        Flash::success(__('messages.customer.customer_saved_successfully'));


        return redirect(route('edit.address'  ,   ['customer'=> $output['customer_id']  ,  'address'=>$output['address']  ,  'new'=>'customer' ]));

        //redirect to the  address area

        return redirect(route('customers.index'));
    }

    /**
     * Display the specified Customer.
     *
     * @param  Customer  $customer
     * @return View
     *
     * @throws Exception
     */
    public function show(Customer $customer)
    {
        $groupName = (request('group') == null) ? 'profile' : request('group');
        $data['groupName'] = $groupName;
        $customer = $this->customerRepository->prepareCustomerData($customer);
        $customers = Customer::pluck('company_name', 'id')->toArray();
        $data['customer'] = $customer;
        $data['customers'] = $customers;

        if ($groupName == 'profile') {
            [$data['billingAddress'], $data['shippingAddress']] = $this->customerRepository->prepareAddress($customer);
            $data['customerGroups'] = $customer->customerGroups()->pluck('name');
            $data['country'] = Country::orderBy('name', 'asc')->pluck('name', 'id')->toArray();
        } elseif (in_array($groupName, ['reminders', 'notes'])) {
            $records = $this->customerRepository->getReminderData($customer->id, Customer::class);
            $data['data'] = $records;
            if ($groupName == 'notes') {
                $notes = $this->customerRepository->getNoteData($customer);
                $data['notes'] = $notes;
            }
        } elseif ($groupName == 'tasks') {
            $data['status'] = Task::STATUS;
            $data['priorities'] = Task::PRIORITY;
        }

        return view("customers.views.$groupName")->with($data);
    }

    /**
     * Show the form for editing the specified Customer.
     *
     * @param  Customer  $customer
     * @return Factory|View
     */

    public function edit(Customer $customer)
    {
        $data = $this->customerRepository->getSyncList();
        [$data['billingAddress'], $data['shippingAddress']] =
        $this->customerRepository->prepareAddress($customer,
            true);
            //pass the addresses heere
        $addresses  =  Address::where([['owner_id'   , $customer->id] ,  ['type' ,'Billing Address']] )->orderby('id' , 'desc')->paginate(100);

        return view('customers.edit', compact('customer', 'data' , 'addresses'));
    }


    //delete  address

    public function  delete_address($address){
        $dele  = Address::find($address);
        //delete the shipping area also okay
        $dele_ship  = Address::where('billing_id'  , $dele->id)->delete();
        $dele->delete();
        Flash::success('Address Deleted');

        return back();


    }

    /**r
     * Update the specified Customer in storage.
     *
     * @param  Customer  $customer
     * @param  UpdateCustomerRequest  $request
     * @return RedirectResponse|Redirector
     *
     * @throws Exception
     */
    public function update(Customer $customer, UpdateCustomerRequest $request)
    {
        $this->customerRepository->update($request->all(), $customer);

        Flash::success(__('messages.customer.customer_updated_successfully'));

        return redirect(route('customers.index'));
    }

    /**
     * Remove the specified Customer from storage.
     *
     * @param  Customer  $customer
     * @return JsonResponse
     *
     * @throws Exception
     */
    public function destroy(Customer $customer)
    {
        try {
            DB::beginTransaction();
            $customer->address()->delete();

            activity()->performedOn($customer)->causedBy(getLoggedInUser())
                ->useLog('Customer deleted.')->log($customer->company_name.' Customer deleted.');

            if ($customer->contact()->exists()) {
                $customer->contact()->first()->user()->delete();
                $customer->contact()->delete();
            }

            $customer->invoice()->delete();
            $customer->creditNote()->delete();
            $customer->estimate()->delete();
            $customer->project()->delete();
            $customer->contract()->delete();
            $customer->proposal()->delete();

            $this->customerRepository->delete($customer->id);

            DB::commit();

            return $this->sendSuccess('Customer deleted successfully.');
        } catch (Exception $exception) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($exception->getMessage());
        }
    }

    /**
     * @param  Customer  $customer
     * @return mixed
     */
    public function getNotesCount(Customer $customer)
    {
        return $this->sendResponse($customer->notes()->count(), 'Notes count retrieved successfully.');
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function searchCustomer(Request $request)
    {
        $input = $request->all();
        $searchCustomer = $this->customerRepository->searchCustomerData($input['searchData']);

        return $this->sendResponse($searchCustomer, 'Customer search data successfully.');
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function addCustomerAddress(Request $request)
    {
        $input = $request->all();
        $this->customerRepository->addCustomerAddress($input);

        return $this->sendSuccess('success');
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function leadConvertToCustomer(Request $request)
    {
        $input = $request->all();
        $emailExists = User::whereEmail($input['email'])->exists();
        if ($emailExists) {
            return $this->sendError('Email id already exists');
        }

        $customer = $this->customerRepository->leadConvertToCustomer($input);

        return $this->sendSuccess('Lead convert to customer');
    }
}
