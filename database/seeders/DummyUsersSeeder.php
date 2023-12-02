<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'nis'=>'123',
                'nama'=>'Tegar',
                'username'=>'user',
                'password'=>'123',
                'role'=>'user'
            ],
            [
                'nis'=>'321',
                'nama'=>'Fatur',
                'username'=>'petugas',
                'password'=>'123',
                'role'=>'petugas'
            ],
            [
                'nis'=>'213',
                'nama'=>'Rachman',
                'username'=>'admin',
                'password'=>'123',
                'role'=>'admin'
            ]
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
