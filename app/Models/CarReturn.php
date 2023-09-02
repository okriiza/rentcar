<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarReturn extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_loan_id',
        'total'
    ];

    public function carloan()
    {
        return $this->belongsTo(CarLoan::class, 'car_loan_id', 'id');
    }
}
