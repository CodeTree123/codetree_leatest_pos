<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
   public function customerInfo()
   {
   	return $this->belongsTo('App\Customer','customer_id');
   }

    public function billerInfo()
   {
   	return $this->belongsTo('App\Biller','biller_id');
   }
}
