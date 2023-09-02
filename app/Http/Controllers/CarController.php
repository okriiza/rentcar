<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::orderBy('created_at', 'desc')->get();
        return view('pages.admin.car.index', compact('cars'));
    }
    public function create()
    {
        return view('pages.admin.car.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'plat_number' => 'required',
            'rental_rates' => 'required'
        ]);

        Car::create([
            'brand' => $request->brand,
            'model' => $request->model,
            'plat_number' => $request->plat_number,
            'rental_rates' => $request->rental_rates
        ]);

        return to_route('car.index')->with('success', 'Data Berhasil Di Buat');
    }
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('pages.admin.car.edit', compact('car'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'plat_number' => 'required',
            'rental_rates' => 'required'
        ]);
        $car = Car::findOrFail($id);

        $car->update([
            'brand' => $request->brand,
            'model' => $request->model,
            'plat_number' => $request->plat_number,
            'rental_rates' => $request->rental_rates
        ]);

        return to_route('car.index')->with('success', 'Data Berhasil Di Update');
    }
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return to_route('car.index')->with('success', 'Data Berhasil Di Hapus');
    }
}
