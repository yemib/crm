<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class reminder extends Model
{
    use HasFactory;



    protected $fillable = [
        'owner_id',
        'owner_type',
        'notified_date',
        'reminder_to',
        'added_by'  ,
        'description',
        'is_notified',
        'status',
        ] ;


        public static $rules = [

        ];




        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class, 'reminder_to');
        }

}
