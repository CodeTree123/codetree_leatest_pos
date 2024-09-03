<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    protected $fillable = ['employee_id', 'basic_salary', 'total_deductions', 'total_bonuses', 'net_salary', 'pay_date'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
