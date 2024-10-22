<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }

    public function deductions()
    {
        return $this->hasMany(Deduction::class);
    }

    public function bonuses()
    {
        return $this->hasMany(Bonus::class, 'employee_id', 'id');
    }

    public function store_attendances(){
        return $this->hasMany(StoreAttendence::class, 'employee_id', 'id');
    }
}
