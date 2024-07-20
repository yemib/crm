<?php

namespace App\Repositories;

use App\Models\WarrantyType;

/**
 * Class WarrantyTypeRepository
 *
 * @version April 3, 2020, 9:11 am UTC
 */
class WarrantyTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'number',
        'type',
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
        return WarrantyType::class;
    }
}
