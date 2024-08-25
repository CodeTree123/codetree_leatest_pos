<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
   public function brandInfo()
   {
   	return $this->belongsTo('App\Brands','brand');
   }

   public function categoryInfo()
   {
   	return $this->belongsTo('App\Category','category');
   }
    public function unitInfo()
   {
   	return $this->belongsTo('App\Units','unit');
   }
   public function stockInfo()
   {
      return $this->belongsTo('App\Stock','id','pro_id');
   }
   public function supplierInfo()
   {
      return $this->belongsTo('App\Supplier','supplier','id');
   }
}
