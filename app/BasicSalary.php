<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicSalary extends Model
{
    use HasFactory;
    protected $fillable = ['employee_id', 'basic_salary'];
    

 // Relationship with Payroll
 public function payrolls()
 {
     return $this->hasMany(Payroll::class, 'employee_id', 'employee_id');
 }
    
}
