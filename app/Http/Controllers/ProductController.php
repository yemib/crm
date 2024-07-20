<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Imports\ProductsImport;
use App\Models\Product;
use App\Queries\ProductDataTable;
use App\Repositories\ProductRepository;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends AppBaseController
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {

        //place the additon here

       if (!Schema::hasColumn('items', 'subcategory1')) {

           DB::statement('ALTER TABLE items ADD COLUMN  brand TEXT');
              DB::statement('ALTER TABLE items ADD COLUMN  subcategory1 TEXT');
             DB::statement('ALTER TABLE items ADD COLUMN  subcategory2 TEXT');
             DB::statement('ALTER TABLE items ADD COLUMN  product_code TEXT');

        }


        if (!Schema::hasColumn('items', 'warranty_period')) {

            DB::statement('ALTER TABLE items ADD COLUMN  warranty_period INT');



        }



        $this->middleware('product');
        $this->productRepository = $productRepo;
    }


    public function import(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        // Get the uploaded file
        $file = $request->file('file');

        // Import data from the uploaded file
        Excel::import(new ProductsImport, $file);
        return $this->sendSuccess(__('messages.products.product_saved_successfully'));

        return redirect()->back()->with('success', 'Data imported successfully!');
    }

    public  function update_product_warranty(){
        //update all the warranties at once.
        $all  =  Product::where('warranty_period'  ,  NULL)->get();
        foreach($all as  $product){
            $save= Product::find($product->id);
            $save->warranty_period  =  2  ;
            $save->save()  ;
        }
        return  "done";
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
            return DataTables::of((new ProductDataTable())->get($request->only(['group'])))->make(true);
        }

        $data = $this->productRepository->getSyncListForItem();

        return view('products.index', compact('data'));
    }


    public function warranty(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of((new ProductDataTable())->get($request->only(['group'])))->make(true);
        }

        $data = $this->productRepository->getSyncListForItem();

        return view('products.index', compact('data'));
    }


    /**
     * @param  CreateProductRequest  $request
     * @return mixed
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();
        $input['rate'] = removeCommaFromNumbers($input['rate']);

        $product = $this->productRepository->create($input);


        if($_POST['warranty_period']   ==  ""){

                //update it to 2 years

                $save  =  Product::find($product->id);
                $save->warranty_period   =  2  ;
                $save->save()  ;

        }




        activity()->performedOn($product)->causedBy(getLoggedInUser())
            ->useLog('New Product created.')->log($product->title.' Product created.');

        return $this->sendSuccess(__('messages.products.product_saved_successfully'));
    }

    /**
     * @param  Product  $product
     * @return mixed
     */
    public function edit(Product $product)
    {
        $product = $this->productRepository->getProduct($product->id);

        return $this->sendResponse($product, 'Product retrieved successfully.');
    }

    /**
     * @param  Product  $product
     * @param  UpdateProductRequest  $request
     * @return mixed
     */
    public function update(Product $product, UpdateProductRequest $request)
    {
        $input = $request->all();
        $input['rate'] = removeCommaFromNumbers($input['rate']);

        $product = $this->productRepository->update($input, $product->id);

        activity()->performedOn($product)->causedBy(getLoggedInUser())
            ->useLog('Product updated.')->log($product->title.' Product updated.');

        return $this->sendSuccess(__('messages.products.product_updated_successfully'));
    }

    /**
     * @param  Product  $product
     * @return mixed
     */
    public function destroy(Product $product)
    {
        activity()->performedOn($product)->causedBy(getLoggedInUser())
            ->useLog('Product deleted.')->log($product->title.' Product deleted.');

        $product->delete();

        return $this->sendSuccess('Product deleted successfully.');
    }
}
