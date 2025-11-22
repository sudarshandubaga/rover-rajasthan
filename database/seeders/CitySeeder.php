<?php

namespace Database\Seeders;

use App\Http\Traits\UtilTrait;
use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    use UtilTrait;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = ["Jodhpur", "Jaipur", "Udaipur", "Bikaner", "Agra", "Delhi", "Kota", "Pushkar", "Mount Abu", "Jaisalmer", "Ajmer", "Kumbhalgarh", "Ranakpur", "Nathdwara", "Osian"];

        foreach ($cities as $cityName) {
            City::create([
                'name' => $cityName,
                'slug' => $this->createSlug($cityName)
            ]);
        }
    }
}
