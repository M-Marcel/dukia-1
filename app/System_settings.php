<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System_settings extends Model
{
    
    protected $table= 'system_settings';
    
    protected $fillable = [
        'gold_value'
    ]; 
}
