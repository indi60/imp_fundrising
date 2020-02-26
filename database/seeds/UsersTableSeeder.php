<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'donatur',
                'email' => 'donatur@gmail.com',
                'password' => bcrypt('donatur123'),
                'level' => 1,
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'level' => 2,
            ],
            [
                'name' => 'fundraiser',
                'email' => 'fundraiser@gmail.com',
                'password' => bcrypt('fundraiser123'),
                'level' => 3,
            ]
        ];

        User::insert($data);
    }
}
