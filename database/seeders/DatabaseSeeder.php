<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Devision;
use App\Models\note;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username' => 'TheCandyy111',
            'photo_profile' => 'pp.png',
            'email' => 'ajel@gmail.com',
            'telepon' => '087827563203',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'username' => 'Moonlight',
            'photo_profile' => null,
            'email' => 'fachri@gmail.com',
            'telepon' => '086765455445',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'username' => 'Parii!!',
            'photo_profile' => 'pacarrouf.jpg',
            'email' => 'rouf2007@gmail.com',
            'telepon' => '087986477533',
            'password' => bcrypt('12345678'),
        ]);
    }
}
