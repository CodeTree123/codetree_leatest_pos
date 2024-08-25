<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function categoryInfo()
    {
        return $this->belongsTo('App\ExpenseCategory','category');
    }
    public function adminInfo()
    {
        return $this->belongsTo('App\Admin','added_by');
    }
}
