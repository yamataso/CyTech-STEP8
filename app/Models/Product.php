<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function Company(){
        return $this->belongsTo('App\Models\Company');
    }
}
