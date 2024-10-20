<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{


    public function customerPromocode()
    {
        return $this->hasOne(CustomerPromocode::class, 'promocode_id')
                    ->where('customer_id', session('customer'));
    }
    

}