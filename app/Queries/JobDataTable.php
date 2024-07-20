<?php

namespace App\Queries;

use App\Models\Job;

/**
 * Class TagDataTable
 */
class JobDataTable
{
    /**
     * @return Service
     */
    public function get()
    {

            $query = Job::query()->select('jobs.*')->latest();

            return $query;

    }
}
