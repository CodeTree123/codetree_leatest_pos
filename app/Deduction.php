<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    use HasFactory;
    protected $fillable = ['employee_id', 'deduction_amount', 'description','deduction_date','is_excused'];
    

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
