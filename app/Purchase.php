<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function supplier()
    {
        return $this->belongsTo('App\Supplier', 'supplier_id');
    }

    public function store()
    {
        return $this->belongsTo('App\Store', 'store_id');
    }
}
