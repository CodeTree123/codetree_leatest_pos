<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    use HasFactory;
    protected $fillable = ['employee_id', 'tax', 'social_security', 'other_deductions'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
