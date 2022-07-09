<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Professor;

class ProfessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $professor = [
            [
                'name' => 'Dr. Kamal Sheel Mishra',
                'emali' => 'teacher@teacher.com',
                'courses' => 'BCA',
                'unavailable_periods'=>'12:40 - 1:30',
            ],
            [
                'name' => 'Mr. Shambu Sharan Srivastava',
                'emali' => 'teacher@teacher.com',
                'courses' => 'BCA',
                'unavailable_periods'=>'1:30 - 2:20',
            ],
            [
                'name' => 'Mr. Anand Prakash Dubey',
                'emali' => 'teacher@teacher.com',
                'courses' => 'BCA',
                'unavailable_periods'=>'12:40 - 1:30',
            ],
            [
                'name' => 'Mr. Vikash Chandra Sharma',
                'emali' => 'teacher@teacher.com',
                'courses' => 'BCA',
                'unavailable_periods'=>'11:00 - 11:50',
            ],
            [
                'name' => 'Ms. Poorva Sanjay Sabnis',
                'emali' => 'teacher@teacher.com',
                'courses' => 'BCA',
                'unavailable_periods'=>'11:00 - 1:30',
            ],
            [
                'name' => 'Mr. Ram Gopal Gupta',
                'emali' => 'teacher@teacher.com',
                'courses' => 'BCA',
                'unavailable_periods'=>'12:40 - 1:30',
            ],
            [
                'name' => 'Dr. Aditya Kumar Gupta',
                'emali' => 'teacher@teacher.com',
                'courses' => 'BCA',
                'unavailable_periods'=>'12:40 - 1:30',
            ],
            [
                'name' => 'Mr. Sushil Kumar',
                'emali' => 'teacher@teacher.com',
                'courses' => 'BCA',
                'unavailable_periods'=>'12:40 - 1:30',
            ],

        ];
        foreach ($professor as $key => $value) {
            Professor::create($value);
        }
    }
}
