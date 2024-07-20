<?php

namespace App\Imports;

use App\Models\ItemGroup;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithStartRow;

class ProductsImport implements ToModel , WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        //create product group if  it does not exist .

  $item_group  =  ItemGroup::where('name' , $row[4]  )->first();

  if(!isset($item_group->id)){

//save new

    $item_group =  new ItemGroup();
    $item_group->name  =  $row[4]   ;
    $item_group->save();

  }

            $all  =  ["title" =>  $row[2],
            "description" => $row[3],

            "item_group_id" =>  $item_group->id,

            "brand"=> $row[7]  ,
            "subcategory1" => $row[5],
            "subcategory2"  =>  $row[6],
            "product_code" =>  $row[2],
            "rate" =>   $row[8] ,
            "warranty_period"  => 2 ,
            ];

        return new Product($all);
    }




    public function startRow(): int
    {
        return 5; // Start importing from the 4th row
    }



}
