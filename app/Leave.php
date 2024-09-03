<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = ['emp_id', 'start_date', 'end_date', 'reason', 'status'];

    // Define relationship to Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }
}
