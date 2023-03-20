<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customers;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $genderFake = ['M', 'F', 'O'];
        $bloodArray = ['1', '2', '3', '4'];
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            $customer = new Customers();
            $customer->name = $faker->name;
            $customer->email = $faker->email;
            $customer->gender = $genderFake[rand(0, 2)];
            $customer->blood_id = $bloodArray[rand(0, 3)];
            $customer->phone = $faker->phoneNumber;
            $customer->address = $faker->address;
            $customer->country = $faker->country;
            $customer->password = $faker->password;
            $customer->save();
        }
    }
}