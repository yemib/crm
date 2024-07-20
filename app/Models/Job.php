<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;


    public function  customer(){

      return  $this->belongsTo(customer::class  ,  'customer_id');
    }


    public function  invoice(){

        return  $this->belongsTo(Invoice::class  ,  'invoice_id');
      }



}
