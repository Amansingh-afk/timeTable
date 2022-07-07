<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'is_admin' => '1',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Teacher',
                'email' => 'teacher@teacher.com',
                'is_admin' => '2',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'User',
                'email' => 'student@student.com',
                'is_admin' => '0',
                'password' => bcrypt('password'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
