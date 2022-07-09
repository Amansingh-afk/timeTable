<?php

namespace Database\Seeders;

use App\Models\Courses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses =[
            [
                'name' => 'Computer Fundamentals & Office Automation',
                'course_code' => 'BCA_S101T',
                'department' => 'BCA',
                'semester' => 'I',
                'professor' => '--'
            ],
            [
                'name' => 'Programming Principle & ALogrithm',
                'course_code' => 'BCA_S102T',
                'department' => 'BCA',
                'semester' => 'I',
                'professor' => '--'
            ],
            [
                'name' => 'Principle of Management',
                'course_code' => 'BCA_S103',
                'department' => 'BCA',
                'semester' => 'I',
                'professor' => '--'
            ],
            [
                'name' => 'Business Communication',
                'course_code' => 'BCA_S104',
                'department' => 'BCA',
                'semester' => 'I',
                'professor' => '--'
            ],
            [
                'name' => 'Mathematics-I',
                'course_code' => 'BCA_S105',
                'department' => 'BCA',
                'semester' => 'I',
                'professor' => '--'
            ],
            [
                'name' => 'Lab & Practical of Office Automation',
                'course_code' => 'BCA_S10P',
                'department' => 'BCA',
                'semester' => 'I',
                'professor' => '--'
            ],
            [
                'name' => 'Lab & Practical work of Programming Principle & Algorithm',
                'course_code' => 'BCA_S101T',
                'department' => 'BCA',
                'semester' => 'I',
                'professor' => '--'
            ],
        ];
        foreach($courses as $key => $value){
            Courses::create($value);
        }
    }
}
