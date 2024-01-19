<?php

namespace Database\Seeders;

use App\Domain\User\Model\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Steve Jobs',
                'email' => 'stevejobs@apple.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Herman Hollerith',
                'email' => 'hermanhollerith@ibm.com',
                'password' => Hash::make('password'),
            ],

        ];

        User::insert($users);
    }
}
