<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blood;



class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bloodArray = ['O+', 'A+', 'B+', 'AB+'];
        for ($i = 0; $i < 4; $i++) {
            $blood = new Blood();
            $blood->blood_group = $bloodArray[$i];
            $blood->save();
        }
    }
}