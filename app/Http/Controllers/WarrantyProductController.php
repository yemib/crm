<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Country;
use App\Models\Customer;
use App\Models\CustomerGroup;
use App\Models\Product;
use App\Models\ProductGroup;
use App\Models\ProductWarranty;
use App\Models\Warranty;
use App\Models\Ticket;
use App\Queries\ProductwarrantyDataTable;
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

class WarrantyProductController extends AppBaseController
{
    /** @var ServiceRepository */
    private $serviceRepository;

    public function __construct(WarrantyRepository $serviceRepo)
{
    //create the table.

  if (!Schema::hasTable('warrantyproducts')) {
    Schema::create('warrantyproducts', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->integer('warranty_id')->nullable();
        $table->string('product')->nullable();
        $table->integer('product_id')->nullable();
        $table->integer('quantity')->nullable();
        $table->string('description')->nullable();
        $table->string('duration')->nullable();
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
            return DataTables::of((new ProductwarrantyDataTable())->get())->make(true);
        }

        //now send the warranty details  and the id .
        $warrant_detail  =  Warranty::find($_GET['id']);
        $products  =  Product::orderby('id'  , 'desc')->get();
        $all = array(  'products'=>$products   , 'warrant_detail' =>  $warrant_detail );
        session('warranty_id' , $_GET['id']);
        return view('productwarranty.index')->with($all);
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

       $save  = new ProductWarranty();
       $save->warranty_id  = $request->warranty_id;
       $product  =  Product::find($request->product);
        $save->product  =  $product->title;
       $save->product_id  =  $product->id;
       $save->quantity  =  $request->quantity ;
       $save->description   = $request->description ;
       $save->duration   = $request->duration  ;

       $save->save();

       //update the warranty product count
       $war  =  Warranty::find($request->warranty_id);
       $war->product_count = 1 ;
       $war->save();


        activity()->performedOn($save)->causedBy(getLoggedInUser())
            ->useLog('New Warranty Product created.')->log($save->id.' Warranty Product  created.');

        return $this->sendResponse($save, "Successful");
    }

    /**
     * Show the form for editing the specified Service.
     *
     * @param  Service  $service
     * @return JsonResource
     */
    public function edit(ProductWarranty $service)
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
    public function update(Request $request, ProductWarranty $service)
    {

        $save  =  ProductWarranty::find($service->id);
        //$save->warranty_id  = $request->warranty_id;
        $product  =  Product::find($request->product);
         $save->product  =  $product->title;
        $save->product_id  =  $product->id;
        $save->quantity  =  $request->quantity ;
        $save->description   = $request->description ;
        $save->duration   = $request->duration  ;

        $save->save();

        activity()->performedOn($save)->causedBy(getLoggedInUser())
            ->useLog('Warranty updated.')->log(' Warranty updated.');

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
    public function destroy(ProductWarranty $service)
    {
        $del  = ProductWarranty::find($service->id);




     /*    $ticketServiceId = Ticket::where('service_id', '=', $service->id)->exists();

        if ($ticketServiceId) {
            return $this->sendError(__('messages.service.service_used_somewhere_else'));
        }
 */
        activity()->performedOn($del)->causedBy(getLoggedInUser())
            ->useLog('Service deleted.')->log(' Warranty Product deleted.');

        $service->delete();

        //check the warranty product count.
        $check = ProductWarranty::where('warranty_id' , $del->warranty_id)->count();
        if($check == 0){

            $war  =  Warranty::find( $del->warranty_id);
            $war->product_count = 0;
            $war->save();

        }


        return $this->sendSuccess('Service deleted successfully.');
    }
}
