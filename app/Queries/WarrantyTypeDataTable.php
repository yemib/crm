<?php

namespace App\Queries;

use App\Models\WarrantyType;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class TagDataTable
 */
class WarrantyTypeDataTable
{
    /**
     * @return ExpenseCategory|Builder
     */
    public function get()
    {
        /** @var ExpenseCategory $query */
        $query = WarrantyType::query()->select()->latest();

        return $query;
    }
}
