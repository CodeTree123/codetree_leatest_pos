<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesProducts extends Model
{
    //
    public function products()
    {
        return $this->belongsTo(Products::class, 'pro_id', 'id'); // Assuming `pro_id` is the foreign key
    }

    public function sales()
    {
        return $this->belongsTo(Sales::class, 'sale_id', 'id'); // Assuming `pro_id` is the foreign key
    }
    
}
