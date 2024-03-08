<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'is_admin' => 1,


        ]);
        $string = ['car_sale', 'car_buy', 'car_expense', 'company_expense', 'car_balance_payment'];
        foreach ($string as $str)
            \App\Models\Setting::create([
                'category' => $str,
            ]);
    }
}
