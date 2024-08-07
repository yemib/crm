<?php

namespace App\Repositories;

use App\Models\MemberGroup;

/**
 * Class MemberGroupRepository
 */
class MemberGroupRepository  extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
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
        return MemberGroup::class;
    }
}
