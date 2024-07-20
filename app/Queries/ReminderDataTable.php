<?php

namespace App\Queries;

use App\Models\Reminder;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class ReminderDataTable
 */
class ReminderDataTable
{
    /**
     * @param  array  $input
     * @return Reminder|Builder
     */
    public function get($input = [])
    {
        /** @var Reminder $query */
        $query = Reminder::with('user')->select('reminders.*')
            ->where('owner_id', $input['owner_id'])
           ;

        return $query->select('reminders.*');
    }
}
