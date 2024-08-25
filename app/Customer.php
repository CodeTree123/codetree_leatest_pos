<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    

    public function groupName()
    {
        return $this->belongsTo('App\CustomerGroup','group');
    }
}
