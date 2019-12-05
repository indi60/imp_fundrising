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
                'name' => 'project_owner',
                'email' => 'project_owner@gmail.com',
                'password' => bcrypt('project_owner123'),
                'level' => 3,
            ]
        ];

        User::insert($data);
    }
}
