<?php

namespace App\Queries;

use App\Models\MemberGroup;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class CustomerGroupDataTable
 */
class MemberGroupDataTable
{
    /**
     * @return CustomerGroup|Builder
     */
    public function get()
    {
        /** @var CustomerGroup $query */
        return MemberGroup::withCount('members')->latest();
    }
}
