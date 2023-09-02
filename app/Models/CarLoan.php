<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarLoan extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_start',
        'date_end',
        'car_id',
        'user_id',
        'status'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function getRemainingDaysAttribute()
    {
        if ($this->date_end) {
            $remaining_days = Carbon::now()->diffInDays(Carbon::parse($this->date_end));
        } else {
            $remaining_days = 0;
        }
        return $remaining_days;
    }
}
