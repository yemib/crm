<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\SalesItem;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class assigned_warranty_controller extends Controller
{
    //

 public function __construct() {

  $this->middleware('general_permission');
 }


    public function save_void($id){
        $save  =  Invoice::find($id);
        $save->warranty = -1 ;
        $save->save()  ;
        foreach(  $save ->salesItems  as  $salesitem){
            $update_sale = SalesItem::find($salesitem->id);
             //check for the warranty period..
             $update_sale->warranty  = NULL ;

             $update_sale->save();

         }


        Flash::success('Warranty Made Void');

        return redirect(route('employee.void.warranties'));


    }

    public function active_warranty()
    {
        $paymentStatuses = Invoice::PAYMENT_STATUS;

        $status = 1 ;
        $title = "Active";

        return view('assigned_warranty.index', compact('paymentStatuses'  , 'status'  , 'title'));
    }



    public function void_warranty()
    {
        $paymentStatuses = Invoice::PAYMENT_STATUS;

        $status = -1 ;
        $title = "Void";

        return view('assigned_warranty.index', compact('paymentStatuses'  , 'status'  , 'title'));
    }



    public function expired_warranty()
    {

        $paymentStatuses = Invoice::PAYMENT_STATUS;

        $status = -2 ;
        $title = "Expired";

        return view('assigned_warranty.index', compact('paymentStatuses'  , 'status'  , 'title'));
    }







}
