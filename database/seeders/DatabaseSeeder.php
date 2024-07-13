<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Devision;
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
        Company::create([ 
            'company_name' => 'PT.Ajel Teknologi Indonesia',
            'npwp_number' => '9283564787656789',
            'expired_date' => '2026-02-02',
            'status' => 'A',
            'create_user' => 1,
            'update_user' => 1,
        ]);

        Devision::create([ 
            'division_name' => 'IT Support',
            'company_id' => 1,
            'status' => 'A',
            'create_user' => 1,
            'update_user' => 1,
        ]);

        User::create([ 
            'first_name' => 'Hazel',
            'last_name' => 'Avriel Fauzan',
            'username' => 'TheCandyy111',
            'photo_profile' => 'pp.png',
            'email' => 'ajel@gmail.com',
            'telepon' => '087827563203',
            'division_id' => null,
            'company_id' => 1,
            'type' => 'P',
            'status' => 'A',
            'password' => bcrypt('12345678'),
            'create_user' => 1,
            'update_user' => 1,
        ]);

        User::create([ 
            'first_name' => 'Faris',
            'last_name' => 'Raufullah',
            'username' => 'Moonlight',
            'photo_profile' => null,
            'email' => 'roup@gmail.com',
            'telepon' => '086765455445',
            'division_id' => null,
            'company_id' => 1,
            'type' => 'C',
            'status' => 'A',
            'password' => bcrypt('12345678'),
            'create_user' => 1,
            'update_user' => 1,
        ]);
    }
}
