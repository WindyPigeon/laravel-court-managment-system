<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        User::firstOrCreate([
            'name' => 'John Doe',
            'email' => 'admin@gmail.com',
            'phone' => '1234567',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        User::factory()
            ->count(10)
            ->state(new Sequence(
                ['is_admin' => 1],
                ['is_admin' => 0],
            ))
            ->create();
    }
}
