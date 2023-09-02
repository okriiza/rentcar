<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            [
                'brand' => 'Toyota',
                'model' => 'Camry',
                'plat_number' => 'D 2332 AW',
                'rental_rates' => '500000'
            ],
            [
                'brand' => 'Toyota',
                'model' => 'Alphard',
                'plat_number' => 'D 2332 AW',
                'rental_rates' => '100000'
            ],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
