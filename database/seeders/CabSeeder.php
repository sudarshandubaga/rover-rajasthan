<?php

namespace Database\Seeders;

use App\Models\Cab;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cab::insert([
            [
                'vehicle_type' => 'Sedan',
                'capacity' => 4,
                'fare' => 12
            ],
            [
                'vehicle_type' => 'SUV',
                'capacity' => 7,
                'fare' => 18
            ],
            [
                'vehicle_type' => 'Traveler',
                'capacity' => '12-17',
                'fare' => 25
            ],
            [
                'vehicle_type' => 'Urbania',
                'capacity' => '12-17',
                'fare' => 35
            ],
            [
                'vehicle_type' => 'Mini-Bus',
                'capacity' => 35,
                'fare' => 50
            ],
            [
                'vehicle_type' => 'Bus',
                'capacity' => 41,
                'fare' => 65
            ],
        ]);
    }
}
