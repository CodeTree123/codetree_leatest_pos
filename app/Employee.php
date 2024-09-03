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
        return $this->hasOne(Deduction::class);
    }

    public function bonuses()
    {
        return $this->hasMany(Bonus::class, 'employee_id', 'id');
    }
}
