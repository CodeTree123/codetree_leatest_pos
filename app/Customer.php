<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    

    public function groupName()
    {
        return $this->belongsTo('App\CustomerGroup','group');
    }

    // Define the one-to-one relationship with Nominee
    public function nominee()
    {
        return $this->belongsTo('App\Nominee', 'nominee_id');
    }
    
}
