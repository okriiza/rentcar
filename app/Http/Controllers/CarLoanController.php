<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarLoan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CarLoanController extends Controller
{
  public function index()
  {
    $carLoans = CarLoan::with('user')->orderBy('created_at', 'desc')->get();
    $cars = Car::where('status', 'TERSEDIA')->get();
    $users = User::where('roles', 'USER')->get();
    return view('pages.admin.car-loan.index', compact('carLoans', 'cars', 'users'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'date_start' => 'required|date',
      'date_end' => 'required|date',
      'car_id' => 'required',
      'user_id' => 'required'
    ]);

    $dateStart = Carbon::parse($request->date_start);
    $dateEnd = Carbon::parse($request->date_end);

    $conflictingDates = CarLoan::select('date_start', 'date_end')
      ->where(function ($query) use ($dateStart, $dateEnd) {
        $query->whereBetween('date_start', [$dateStart, $dateEnd])
          ->orWhereBetween('date_end', [$dateStart, $dateEnd])
          ->orWhere(function ($query) use ($dateStart, $dateEnd) {
            $query->where('date_start', '<', $dateStart)
              ->where('date_end', '>', $dateEnd);
          });
      })->where('status', '!=', "LUNAS")
      ->get();
    if ($conflictingDates->count() > 0 && $conflictingDates !== null) {
      $conflictingDatesString = $conflictingDates->map(function ($item) {
        return "Dari Tanggal " . $item->date_start . " - " . $item->date_end;
      })->implode(' lalu ');
      return redirect()->back()->with('error', 'Pada tanggal yang Anda pilih, sudah ada yang menggunakan. Berikut tanggalnya: ' .  $conflictingDatesString);
    }
    CarLoan::create([
      'date_start' => $request->date_start,
      'date_end' => $request->date_end,
      'car_id' => $request->car_id,
      'user_id' => $request->user_id
    ]);

    $car_id = $request->car_id;
    $car = Car::findOrFail($car_id);

    // $car->update([
    //   'status' => 'TIDAK TERSEDIA'
    // ]);

    return to_route('carloan.index')->with('success', 'Data Peminjaman Berhasil Di Tambahkan');
  }
}
