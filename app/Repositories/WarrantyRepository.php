<?php

namespace App\Repositories;

use App\Models\Warranty;

/**
 * Class ServiceRepository
 *
 * @version April 3, 2020, 12:35 pm UTC
 */
class WarrantyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'serial_no',
        'customer',
        'customer_group'
    ];

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
        return Warranty::class;
    }
}
