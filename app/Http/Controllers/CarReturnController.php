<?php

namespace App\Http\Controllers;

use App\Models\CarLoan;
use Illuminate\Http\Request;

class CarReturnController extends Controller
{
    public function index()
    {
        $cars = CarLoan::with('car', 'user')->get();
        return view('pages.admin.car-return.index', compact('cars'));
    }

    public function search(Request $request)
    {
        $platNumber = $request->plat_number;
        $cars = CarLoan::with('user')
            ->whereHas('car', function ($q) use ($platNumber) {
                $q->where('plat_number', 'like', '%' . $platNumber . '%');
            })->get();
        return view('pages.admin.car-return.index', compact('cars'));
    }
}
