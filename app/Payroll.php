<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    protected $fillable = ['employee_id','total_deductions', 'total_bonuses', 'net_salary', 'pay_date'];
    

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // Relationship with BasicSalary
    public function basicSalary()
    {
        return $this->belongsTo(BasicSalary::class,'employee_id', 'employee_id');
    }
}
