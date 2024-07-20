<?php

namespace App\Queries;

use App\Models\ProductWarranty;

/**
 * Class TagDataTable
 */
class ProductwarrantyDataTable
{
    /**
     * @return Service
     */
    public function get()
    {
        /** @var Service $query */
        $query = ProductWarranty::query()->select('warrantyproducts.*')->where('warranty_id' ,  $_GET['id'])->latest();

        return $query;
    }
}
