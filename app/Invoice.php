<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected  $table ='invoice';

    protected $fillable = [
        'transaction_id','status','description','inv_date','inv_time'
    ];
}
