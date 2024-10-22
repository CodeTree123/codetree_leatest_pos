<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use HasFactory;
     // Specify which fields can be mass assigned
     protected $fillable = [
        'employee_id',
        'amount',
        'date_given',
        'description',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
