<?php

namespace App\Repositories;

use App\Models\Address;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\ExpenseCategory;
use App\Models\Estimate;
use App\Models\EstimateAddress;
use App\Models\Invoice;
use App\Models\Item;
use App\Models\Notification;
use App\Models\PaymentMode;
use App\Models\Tag;
use App\Models\TaxRate;
use App\Models\User;
use App\Models\Country;
use App\Mail\DiscountMail;
use Exception;
use Illuminate\Container\Container as Application;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Illuminate\Support\Facades\Mail;

/**
 * Class EstimateRepository
 *
 * @version April 27, 2020, 6:16 am UTC
 */
class EstimateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'status',
        'currency',
        'estimate_number',
        'reference',
        'sales_agent_id',
        'discount_type',
        'estimate_date',
        'estimate_expiry_date',
        'admin_note',
        'discount',
    ];

    /**
     * @var InvoiceRepository
     */
    private $invoiceRepository;

    public function __construct(Application $app, InvoiceRepository $invoiceRepository)
    {
        parent::__construct($app);
        $this->invoiceRepository = $invoiceRepository;
    }

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Estimate::class;
    }

    /**
     * @param  null  $customerId
     * @return mixed
     */
    public function getEstimatesStatusCount($customerId = null)
    {
        if (!empty($customerId)) {
            return Estimate::selectRaw('count(case when status = 0 then 1 end) as drafted')
                ->selectRaw('count(case when status = 1 then 1 end) as sent')
                ->selectRaw('count(case when status = 2 then 1 end) as expired')
                ->selectRaw('count(case when status = 3 then 1 end) as declined')
                ->selectRaw('count(case when status = 4 then 1 end) as accepted')
                ->selectRaw('count(case when status != 0 then 1 end) as total_estimates')
                ->where('customer_id', '=', $customerId)->first();
        }

        return Estimate::selectRaw('count(case when status = 0 then 1 end) as drafted')
            ->selectRaw('count(case when status = 1 then 1 end) as sent')
            ->selectRaw('count(case when status = 2 then 1 end) as expired')
            ->selectRaw('count(case when status = 3 then 1 end) as declined')
            ->selectRaw('count(case when status = 4 then 1 end) as accepted')
            ->selectRaw('count(*) as total_estimates')
            ->first();
    }

    /**
     * @return mixed
     */
    public function getSyncList()
    {
        $data['customers'] = Customer::orderBy('company_name', 'desc')->get();


        $data['tags'] = Tag::orderBy('name', 'asc')->pluck('name', 'id')->toArray();
        $data['saleAgents'] = User::orderBy('first_name', 'asc')->whereIsEnable(true)->user()->get()->pluck(
            'full_name',
            'id'
        )->toArray();

        $data['discountType'] = Estimate::DISCOUNT_TYPES;
        $data['status'] = Estimate::STATUS;
        $data['currencies'] = Customer::CURRENCIES;
        $taxRates = TaxRate::orderBy('tax_rate', 'asc')->get();
        $data['taxes'] = $taxRates;
        $data['taxesArr'] = $taxRates->pluck('tax_rate', 'id')->toArray();
        $data['items'] = Item::orderBy('id', 'desc')->pluck('product_code', 'id')->toArray();
        $data['countries'] = Country::orderBy('name', 'asc')->pluck('name', 'id')->toArray();
        $data['category'] = ExpenseCategory::orderBy('id', 'desc')->get();


        return $data;
    }

    /**
     * @param $input
     * @return Estimate
     */
    public function store($input)
    {
        $contactIds = Contact::where('customer_id', '=', $input['customer_id'])->where(
            'primary_contact',
            '=',
            '1'
        )->pluck('user_id')->toArray();
        $userContacts = User::whereIn('id', $contactIds)->get();

        /** @var Estimate $estimate */
        $estimate = $this->create($this->prepareEstimateData($input));
        //decide on who submit the form

        $update_estimate  =   Estimate::find($estimate->id);

        $update_estimate->is_admin  =  auth()->user()->is_admin;
        $update_estimate->save();

        //check if is admin  or not

        if (auth()->user()->is_admin  ==  0) {

            //send  a mail  if discount exceed  10 %

            if ($update_estimate->discount  >  10) {

                //send a mail
                //get the first admnistrator .
                $admins  =  User::where('is_admin',  1)->get();

                foreach ($admins as $admin) {

                    $link =  "http://" . $_SERVER['HTTP_HOST'] . "/admin/estimates/" . $update_estimate->id . "/edit";
                    $viewlocation   =  "emails.discount";

                    $array  =  ['link' => $link];
                    $to  =   $admin->email;

                    $subject  =  "Discount  Approval Link";

                    $from  =  "cutrico@12dot8.mt";

                    Notification::create([
                        'title' => 'Estimate  Discount  Above 10% ',
                        'description' => "Estimate  Discount  Above 10% Approval",
                        'type' => Estimate::class,
                        'user_id' =>   $admin->id,
                        "link" =>    $link,

                    ]);

                    sendEmail($viewlocation, $array,  $to,  $subject, $from);

                    try {
                        Mail::to($admin->email)->send(new DiscountMail($link));
                    } catch (\Exception  $e) {
                    }
                }
            }
        }





        $users = User::whereId($estimate->sales_agent_id)->get();

        if ($estimate->status == Estimate::STATUS_SEND) {
            if (!empty($input['sales_agent_id'])) {
                foreach ($users as $user) {
                    Notification::create([
                        'title' => 'New Estimate Created',
                        'description' => 'You are assigned to ' . $estimate->title,
                        'type' => Estimate::class,
                        'user_id' => $user->id,
                    ]);
                }
            }
            if (!empty($input['customer_id'])) {
                foreach ($userContacts as $user) {
                    Notification::create([
                        'title' => 'New Estimate Created',
                        'description' => 'You are assigned to ' . $estimate->title,
                        'type' => Estimate::class,
                        'user_id' => $user->id,
                    ]);

                    foreach ($contactIds as $oldUser) {
                        if ($oldUser == $user->id) {
                            continue;
                        }
                        Notification::create([
                            'title' => 'New User Assigned to Estimate',
                            'description' => $user->first_name . ' ' . $user->last_name . ' assigned to ' . $estimate->title,
                            'type' => Estimate::class,
                            'user_id' => $oldUser,
                        ]);
                    }
                }
            }
        }
        activity()->performedOn($estimate)->causedBy(getLoggedInUser())
            ->useLog('New Estimate created.')->log($estimate->title . ' Estimate created.');

        if (isset($input['tags']) && !empty($input['tags'])) {
            $estimate->tags()->sync($input['tags']);
        }
        // Store Address
        $this->addEstimateAddresses($input, $estimate);
        // Store Items
        $this->invoiceRepository->storeSalesItems($input, $estimate);
        // Store Applied Taxes with Amount
        $this->invoiceRepository->storeSalesTaxes($input, $estimate);

        return $estimate;
    }

    /**
     * @param  array  $input
     * @return array
     */

    public function update_address($input, $address_id)
    {

        $addressInputArray = Arr::only($input, ['street', 'city',  'zip_code', 'country', 'locality',  'mapaddress',  'latlog']);
        $addressArray = EstimateAddress::prepareInputForAddress($addressInputArray);
        // Update the record directly
        EstimateAddress::where('id', $address_id)->update($addressArray[1]);

        //now search for the id of the shipping and  update it.
        //check it first.
        $shipping   = EstimateAddress::where('billing_id', $address_id)->first();
        if (isset($shipping->id)) {
            EstimateAddress::where('id', $shipping->id)->update($addressArray[2]);
        }

        return true;
        //update for the  fist and for the second.

    }

    public function prepareEstimateData($input)
    {
        $estimateFields = (new Estimate())->getFillable();
        $items = [];

        foreach ($input as $key => $value) {
            if (in_array($key, $estimateFields)) {
                $items[$key] = $value;
            }
        }

        $items['total_amount'] = formatNumber($input['total_amount']);
        $items['discount'] = formatNumber($input['final_discount']);
        $items['sub_total'] = formatNumber($input['sub_total']);

        return $items;
    }

    /**
     * @param  array  $input
     * @param  Estimate  $estimate
     * @return bool|void
     */
    public function addEstimateAddresses($input, $estimate)
    {
        // for ($i = 0; $i <= 2; $i++) {
        if (!isset($input['address'])) {
            return;
        }
        foreach ($input['address'] as $address) {

            //get the addres details  here  and then  the  bill details  .

            $getaddress  =  Address::find($address);
            $shipping_address  =   Address::where('billing_id', $getaddress->id)->first();
            if (isset($getaddress->id)) {

                $output =  EstimateAddress::create([
                    'street' => (isset($getaddress->street)) ? $getaddress->street : null,
                    'city' => (isset($getaddress->locality)) ? $getaddress->locality : null,
                    'state' => (isset($getaddress->locality)) ? $getaddress->locality : null,
                    'zip_code' => (isset($getaddress->zip)) ? $getaddress->zip : null,
                    'country' => (isset($getaddress->country)) ? (($getaddress->country  ==  2) ? "Gozo" :  "Malta") : null,
                    'type' => 1,
                    'estimate_id' => $estimate->id,
                    'latlog'  =>  $getaddress->latlog,
                    'mapaddress' => $getaddress->mapaddress,
                    'locality'  =>  $getaddress->locality,
                ]);
                if (isset($shipping_address->id)) {
                    EstimateAddress::create([
                        'street' => (isset($shipping_address->street)) ?   $shipping_address->street : null,
                        'city' => (isset($shipping_address->locality)) ?   $shipping_address->locality : null,
                        'state' => (isset($shipping_address->locality)) ?   $shipping_address->locality : null,
                        'zip_code' => (isset($shipping_address->zip)) ?   $shipping_address->zip : null,
                        'country' => (isset($shipping_address->country)) ? (($shipping_address->country  ==  2) ? "Gozo" :  "Malta") : null,
                        'type' => 2,
                        'billing_id' => (isset($output->id)) ? $output->id : null,
                        'estimate_id' => $estimate->id,
                        'latlog'  =>  $shipping_address->latlog,
                        'mapaddress' => $shipping_address->mapaddress,
                        'locality'  =>  $shipping_address->locality,
                    ]);
                }
            }
        }




        // }

        return true;
    }

    /**
     * @param  array  $input
     * @param  Estimate  $estimate
     * @return Estimate
     */
    public function update($input, $estimate)
    {
        $oldUserIds = Estimate::whereId($estimate->id)->get()->pluck('sales_agent_id')->toArray();
        $oldContactIds = Contact::where('customer_id', '=', $estimate->customer_id)->where(
            'primary_contact',
            '=',
            '1'
        )->pluck('user_id')->toArray();

        $userId = implode(' ', $oldUserIds);
        $contactIds = Estimate::whereId($estimate->id)->pluck('customer_id')->toArray();


        $contactId = implode(' ', $contactIds);

        $newUserIds = $input['sales_agent_id'];
        $newContactIds = $input['customer_id'];

        $users = User::whereId($newUserIds)->get();
        $contactUserIds = Contact::where('customer_id', '=', $input['customer_id'])->where(
            'primary_contact',
            '=',
            '1'
        )->pluck('user_id')->toArray();
        $userContacts = User::whereIn('id', $contactUserIds)->get();


        //ge the resend


        //check if is admin  or not

        if (auth()->user()->is_admin  ==  0) {

            //send  a mail  if discount exceed  10 %

            if ($estimate->discount  >  10) {

                //send a mail
                //get the first admnistrator .
                if ($estimate->discount_approved   !=  NULL) {

                    if ($estimate->discount  !=   $input['final_discount']) {

                        //update the discount_approved to  null
                        $change  =   Estimate::find($estimate->id);
                        $change->discount_approved  =  NULL;
                        $change->save();


                        $admins  =  User::where('is_admin',  1)->get();

                        foreach ($admins as $admin) {

                            $link =  "http://" . $_SERVER['HTTP_HOST'] . "/admin/estimates/" . $estimate->id . "/edit";
                            $viewlocation   =  "emails.discount";

                            $array  =  ['link' => $link];
                            $to  =   $admin->email;

                            $subject  =  "Discount  Approval Link";

                            $from  =  "cutrico@12dot8.mt";

                            Notification::create([
                                'title' => 'Estimate  Discount  Above 10% ',
                                'description' => "Estimate  Discount  Above 10% Approval",
                                'type' => Estimate::class,
                                'user_id' =>   $admin->id,
                                "link" =>    $link,

                            ]);

                            sendEmail($viewlocation, $array,  $to,  $subject, $from);

                            try {
                                Mail::to($admin->email)->send(new DiscountMail($link));
                            } catch (\Exception  $e) {
                            }
                        }
                    }
                }
            }
        }




        $estimate->update($this->prepareEstimateData($input));

        //Contacts Notification
        if (!empty($oldContactIds) && $newContactIds !== $contactId) {
            foreach ($oldContactIds as $removedUser) {
                Notification::create([
                    'title' => 'Removed From Estimate',
                    'description' => 'You removed from ' . $estimate->title,
                    'type' => Estimate::class,
                    'user_id' => $removedUser,
                ]);
            }
        }
        if ($userContacts->count() > 0) {
            foreach ($userContacts as $user) {
                Notification::create([
                    'title' => 'New Estimate Assigned',
                    'description' => 'You are assigned to ' . $estimate->title,
                    'type' => Estimate::class,
                    'user_id' => $user->id,
                ]);
                foreach ($oldContactIds as $oldUser) {
                    if ($oldUser == $user->id) {
                        continue;
                    }
                    Notification::create([
                        'title' => 'New User Assigned to Estimate',
                        'description' => $user->first_name . ' ' . $user->last_name . ' assigned to ' . $estimate->title,
                        'type' => Estimate::class,
                        'user_id' => $oldUser,
                    ]);
                }
            }
        }

        if (!empty($oldUserIds) && $newUserIds !== $userId) {
            foreach ($oldUserIds as $removedUser) {
                Notification::create([
                    'title' => 'Removed From Estimate',
                    'description' => 'You removed from ' . $estimate->title,
                    'type' => Estimate::class,
                    'user_id' => $removedUser,
                ]);
            }
        }
        if ($users->count() > 0) {
            foreach ($users as $user) {
                Notification::create([
                    'title' => 'New Estimate Created',
                    'description' => 'You are assigned to ' . $estimate->title,
                    'type' => Estimate::class,
                    'user_id' => $user->id,
                ]);
                foreach ($oldUserIds as $oldUser) {
                    if ($oldUser == $user->id) {
                        continue;
                    }
                    Notification::create([
                        'title' => 'New User Assigned to Estimate',
                        'description' => $user->first_name . ' ' . $user->last_name . ' assigned to ' . $estimate->title,
                        'type' => Estimate::class,
                        'user_id' => $oldUser,
                    ]);
                }
            }
        }

        activity()->performedOn($estimate)->causedBy(getLoggedInUser())
            ->useLog('Estimate updated.')->log($estimate->title . ' Estimate updated.');

        if (isset($input['tags']) && !empty($input['tags'])) {
            $estimate->tags()->sync($input['tags']);
        }

        //check if is set
        if (isset($input['address'])) {


            $estimate->estimateAddresses()->delete();
            $this->addEstimateAddresses($input, $estimate);
        }

        // Update Items
        $this->invoiceRepository->storeSalesItems($input, $estimate);
        // Update Applied Taxes with Amount
        $this->invoiceRepository->storeSalesTaxes($input, $estimate);

        return $estimate;
    }

    /**
     * @param  Estimate  $estimate
     *
     * @throws Exception
     */
    public function deleteEstimate($estimate)
    {
        activity()->performedOn($estimate)->causedBy(getLoggedInUser())
            ->useLog('Estimate deleted.')->log($estimate->title . ' Estimate deleted.');

        $estimate->tags()->detach();
        $estimate->estimateAddresses()->delete();
        $estimate->salesItems()->delete();
        $estimate->salesTaxes()->delete();
        $estimate->delete();
    }

    /**
     * @param  int  $id
     * @param $status
     * @return bool|int
     */
    public function changeEstimateStatus($id, $status)
    {
        return Estimate::whereId($id)->update(['status' => $status]);
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function getSyncForEstimateDetail($id)
    {
        $estimate = Estimate::with([
            'customer', 'user', 'tags', 'salesItems.taxes', 'salesTaxes', 'estimateAddresses',
        ])->find($id);

        return $estimate;
    }

    /**
     * @param $estimateId
     * @return Estimate
     */
    public function getEstimateDetailClient($estimateId)
    {
        $customerId = Auth::user()->contact->customer_id;

        /** @var Estimate $estimate */
        $estimate = Estimate::with([
            'customer', 'user', 'tags', 'salesItems.taxes', 'salesTaxes', 'estimateAddresses',
        ])->whereCustomerId($customerId)->findOrFail($estimateId);

        return $estimate;
    }

    /**
     * @param  int  $id
     * @param $status
     * @return bool|int
     */
    public function changeStatus($id, $status)
    {
        return Estimate::whereId($id)->update(['status' => $status]);
    }

    /**
     * @param  Estimate  $estimate
     * @return Invoice
     */
    public function convertToInvoice($estimate)
    {
        try {
            $data['title'] = $estimate->title;
            $data['customer_id'] = $estimate->customer_id;
            $data['sales_agent_id'] = $estimate->sales_agent_id;
            $data['discount_type'] = $estimate->discount_type;
            $data['invoice_number'] = Invoice::generateUniqueInvoiceId();
            $data['invoice_date'] = $estimate->estimate_date;
            $data['due_date'] = $estimate->estimate_expiry_date;
            $data['currency'] = $estimate->currency;
            $data['unit'] = $estimate->unit;
            $data['adjustment'] = $estimate->adjustment;
            $data['final_discount'] = $estimate->discount;
            $data['sub_total'] = $estimate->sub_total;
            $data['total_amount'] = $estimate->total_amount;
            $data['payment_status'] = Invoice::STATUS_UNPAID;
            $data['payment_modes'] = PaymentMode::whereActive(true)->pluck('id')->toArray();
            $data['tags'] = $estimate->tags->pluck('id')->toArray();
            $data['taxes'] = [];

            foreach ($estimate->salesItems as $key => $record) {
                $itemArr['item'] = $record['item'];
                $itemArr['description'] = $record['description'];
                $itemArr['quantity'] = $record['quantity'];
                $itemArr['rate'] = formatNumber($record['rate']);
                $itemArr['total'] = formatNumber($record['total']);
                $itemArr['warranty_period'] =  $record['warranty_period'] ;
                $data['itemsArr'][] = $itemArr;
            }

            $invoice = $this->invoiceRepository->saveInvoice($data);

            return $invoice;
        } catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
