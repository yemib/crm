<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\SalesItem;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */

     public function getLocalities(Request $request  ,  $json_return  =  true )
     {
         // Load the localities from the configuration file in the public folder

         $maltalocalities= [
            "Attard",
            "Balzan",
            "Birgu",
            "Birkirkara",
            "Birzebbuga",
            "Cospicua",
            "Dingli",
            "Fgura",
            " Floriana",
            "Gudja",
            "Gzira",
            "Qrendi",
            "Rabat",
            "Safi",
            "St. Julian's",
            "San Gwann",
            "St. Paul's Bay",
            "Santa Lucija",
            "Santa Venera",
            "Siggiewi",
            "Sliema",
            "Swieqi",
            "Gharghur",
            "Ta' Xbiex",
            "Ghaxaq",
            "Tarxien",
            "Hamrun",
            "Valletta",
            "Iklin",
            "Xaghra",
            "Senglea",
            "Zabbar",
            "Kalkara",
            "Zebbug",
            "Kirkop",
            "Zejtun",
            "Lija",
            "Zurrieq",
            "Luga",
            "Marsa"
          ] ;


          $gozoLocalities = [
            "Marsaskala",
            "Marsaxlokk",
            "Fontana",
            "Ghajnsielem",
            "Mdina",
            "Gharb",
            "Mellieha",
            "Ghasri",
            "Mgarr",
            "Kercem",
            "Mosta",
            "Munxar",
            "Mqabba",
            "Nadur",
            "Msida",
            "Qala",
            "Imtarfa",
            "Rabat",
            "Naxxar",
            "San Lawrenz",
            "Paola",
            "Sannat",
            "Pembroke",
            "Xaghra",
            "Pietà",
            "Qormi",
            "Xewkija",
            "Zebbug"
        ];

         //
         // Retrieve the selected country from the request
         $country = $request->input('country');
         $output  = [];
         if(strstr($country , "Malta")){
            $output  =  $maltalocalities  ;
         }else{
            $output   = $gozoLocalities;
         }


         if($json_return){
            return response()->json( $output );
         }else{
            return $output ;

         }


     }


public function  getcustomerinvoice(Request  $request){

    //get all the invoice of the customer where warranty is equal to zero  in the javascript  ..

 $get_invoices  =  Invoice::where([['customer_id'   ,  $request->customerid ] ,  ['warranty' ,  1]])->get();

//scan all the invoices


$output  = array();
$date = array();
foreach( $get_invoices  as  $invoice ){


    //get the sales item  interraction
    foreach(  $invoice->salesItems   as $salesitem ){


        $dateToCheck =   $salesitem->warranty; // Replace this with the date you want to check


        if($dateToCheck  != NULL){


        if (strtotime($dateToCheck) > time()) {

            $date[]  =    $invoice->installation_date ;

           // echo "The date is greater than today.";
            $output[] =   $salesitem  ;
        }
    }


    }




}

    return response()->json( ['date'=>$date ,  'output'=>$output]);

}



    public function index()
    {
        return view('home');
    }
}
