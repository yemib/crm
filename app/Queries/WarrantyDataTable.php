<?php

namespace App\Queries;

use App\Models\Warranty;

/**
 * Class TagDataTable
 */
class WarrantyDataTable
{
    /**
     * @return Service
     */
    public function get()
    {
        /** @var Service $query */
        if($_GET['type'] == "open"){

            $query = Warranty::query()->select('warranties.*')->where('product_count' , 0)->latest();

            return $query;
        }else{

            $query = Warranty::query()->select('warranties.*')->where('product_count' , 1)->latest();

            return $query;


        }
    }
}
