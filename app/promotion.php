<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'status', 'promotion_name', 'promotion_start_duration', 
        'promotion_end_duration', 'promotion_ammount' , 'Promotion_product'
    ];

    public function products()
    {
        return $this->belongsToMany(Products::class, 'promotion_product');
    }
}
