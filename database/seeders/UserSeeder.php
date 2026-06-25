<?php

// namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;

// class UserSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         //
//     }
// }

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// class UserSeeder extends Seeder
// {
//     public function run(): void
//     {
//         // ADMIN
//         User::updateOrCreate()([
//             'username' => 'admin',
//             'name' => 'Admin Sistem',
//             'email' => 'admin@gmail.com',
//             'password' => Hash::make('password'),
//             'role' => 'admin'
//         ]);

//         // KEPSEK
//         User::updateOrCreate()([
//             'username' => 'kepsek',
//             'name' => 'Kepala Sekolah',
//             'email' => 'kepsek@gmail.com',
//             'password' => Hash::make('password'),
//             'role' => 'kepsek'
//         ]);

//         // STAF
//         User::updateOrCreate()([
//             'username' => 'staf',
//             'name' => 'Staf Inventaris',
//             'email' => 'staf@gmail.com',
//             'password' => Hash::make('password'),
//             'role' => 'staf'
//         ]);
//     }
// }

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ADMIN
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Admin Sistem',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ]
        );

        //edit admin
        

        // KEPSEK
        User::updateOrCreate(
            ['username' => 'kepsek'],
            [
                'name' => 'Kepala Sekolah',
                'email' => 'kepsek@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'kepsek'
            ]
        );

        // STAF
        User::updateOrCreate(
            ['username' => 'staf'],
            [
                'name' => 'Staf Inventaris',
                'email' => 'staf@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'staf'
            ]
        );
    }
}
