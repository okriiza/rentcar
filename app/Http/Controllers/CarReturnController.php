<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarLoan;
use App\Models\CarReturn;
use Illuminate\Http\Request;

class CarReturnController extends Controller
{
    public function index()
    {
        $carReturn = CarReturn::with(['carloan' => function ($q) {
            $q->with('car', 'user');
        }])->get();
        return view('pages.admin.car-return.index', compact('carReturn'));
    }

    public function search(Request $request)
    {
        $platNumber = $request->plat_number;
        $cars = CarLoan::with('user')
            ->whereHas('car', function ($q) use ($platNumber) {
                $q->where('plat_number', 'like', '%' . $platNumber . '%');
            })
            ->where('status', '=', 'BELUM LUNAS')
            ->get();
        $carReturn = CarReturn::with(['carloan' => function ($q) {
            $q->with(['car', 'user']);
        }])
            ->orderBy('created_At', 'desc')
            ->get();
        return view('pages.admin.car-return.index', compact('cars', 'carReturn'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_loan_id' => 'required',
            'total' => 'required'
        ]);

        CarReturn::create([
            'car_loan_id' => $request->car_loan_id,
            'total' => $request->total
        ]);
        $cal_leon_id = $request->car_loan_id;

        $carLoan = CarLoan::findOrFail($cal_leon_id);
        $carLoan->update([
            'status' => 'LUNAS'
        ]);
        $car_id = $request->car_id;
        $car = Car::findOrFail($car_id);

        $car->update([
            'status' => 'TERSEDIA'
        ]);

        return to_route('carreturn.index')->with('success', 'Pengembalian Berhasil');
    }
}
