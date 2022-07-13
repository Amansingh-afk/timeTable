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
        $courses = [
            [
                'name' => 'Computer Fundamentals & Office Automation',
                'course_code' => 'BCA_S101T',
                'department' => 'BCA',
                'semester' => 'I',
                'professor' => 'MS. POORVA SANJAY SABNIS'
            ],
            [
                'name' => 'Programming Principle & ALogrithm',
                'course_code' => 'BCA_S102T',
                'department' => 'BCA',
                'semester' => 'I',
                'professor' => 'MR. ANAND PRAKASH DUBE'
            ],
            [
                'name' => 'Principle of Management',
                'course_code' => 'BCA_S103',
                'department' => 'BCA',
                'semester' => 'I',
                'professor' => 'MR. AMIT KUMAR BHANJA'
            ],
            [
                'name' => 'Business Communication',
                'course_code' => 'BCA_S104',
                'department' => 'BCA',
                'semester' => 'I',
                'professor' => 'DR. ASHUTOSH SHUKLA'
            ],
            [
                'name' => 'Mathematics-I',
                'course_code' => 'BCA_S105',
                'department' => 'BCA',
                'semester' => 'I',
                'professor' => 'MR. VIKASH CHANDRA SHARMA'
            ],
            [
                'name' => 'Lab & Practical of Office Automation',
                'course_code' => 'BCA_S101P',
                'department' => 'BCA',
                'semester' => 'I',
                'professor' => '--'
            ],
            [
                'name' => 'Lab & Practical work of Programming Principle & Algorithm',
                'course_code' => 'BCA_S102P',
                'department' => 'BCA',
                'semester' => 'I',
                'professor' => '--'
            ],
            [
                'name' => 'C Programming',
                'course_code' => 'BCA-S106T',
                'department' => 'BCA',
                'semester' => 'II',
                'professor' => '--'
            ],
            [
                'name' => 'Digital Electronics & Computer Organization',
                'course_code' => 'BCA-S107',
                'department' => 'BCA',
                'semester' => 'II',
                'professor' => 'MR. ANAND PRAKASH DUBE'
            ],
            [
                'name' => 'Organization Behaviour',
                'course_code' => 'BCA-S108',
                'department' => 'BCA',
                'semester' => 'II',
                'professor' => '--'
            ],
            [
                'name' => 'Financial Accounting & Management',
                'course_code' => 'BCA-S109',
                'department' => 'BCA',
                'semester' => 'I9',
                'professor' => 'DR. SANTOSH KUMAR'
            ],
            [
                'name' => 'Mathematics II',
                'course_code' => 'BCA-S110',
                'department' => 'BCA',
                'semester' => 'II',
                'professor' => 'MR. VIKASH CHANDRA SHARMA'
            ],
            [
                'name' => 'Computer Laboratory and Practical Work of C Programming',
                'course_code' => 'BCA-S106P',
                'department' => 'BCA',
                'semester' => 'II',
                'professor' => '--'
            ],
            [
                'name' => 'Object Oriented Programming Using C++',
                'course_code' => 'BCA-S201T',
                'department' => 'BCA',
                'semester' => 'III',
                'professor' => 'MR. SUSHIL KUMAR'
            ],
            [
                'name' => 'Data Structure Using C & C++',
                'course_code' => 'BCA-S202T',
                'department' => 'BCA',
                'semester' => 'III',
                'professor' => 'MS. POORVA SANJAY SABNIS'
            ],
            [
                'name' => 'Computer Architecture & Assembly Language',
                'course_code' => 'BCA-S203',
                'department' => 'BCA',
                'semester' => 'III',
                'professor' => 'DR. ADITYA KUMAR GUPTA'
            ],
            [
                'name' => 'Business Economics',
                'course_code' => 'BCA-S204',
                'department' => 'BCA',
                'semester' => 'III',
                'professor' => 'DR. ASHWANI KUMAR GUPTA'
            ],
            [
                'name' => 'Elements of Statistics',
                'course_code' => 'BCA-S205',
                'department' => 'BCA',
                'semester' => 'III',
                'professor' => 'MR. ANAND PRAKASH DUBE'
            ],
            [
                'name' => 'Computer Laboratory and Practical Work of OOPS',
                'course_code' => 'BCA-S201P',
                'department' => 'BCA',
                'semester' => 'III',
                'professor' => '--'
            ],
            [
                'name' => 'Computer Laboratory and Practical Work of DS',
                'course_code' => 'BCA-S202P',
                'department' => 'BCA',
                'semester' => 'III',
                'professor' => '--'
            ],
            [
                'name' => 'Computer Graphics & Multimedia Application',
                'course_code' => 'BCA-S206T',
                'department' => 'BCA',
                'semester' => 'IV',
                'professor' => 'DR. ADITYA KUMAR GUPTA'
            ],
            [
                'name' => 'Operating System',
                'course_code' => 'BCA-S207',
                'department' => 'BCA',
                'semester' => 'IV',
                'professor' => 'MR. ANAND PRAKASH DUBE'
            ],
            [
                'name' => 'Software Engineering',
                'course_code' => 'BCA-S208',
                'department' => 'BCA',
                'semester' => 'IV',
                'professor' => 'DR. KAMAL SHEEL MISHRA'
            ],
            [
                'name' => 'Optimization Techniques',
                'course_code' => 'BCA-S209',
                'department' => 'BCA',
                'semester' => 'IV',
                'professor' => 'MS. POORVA SANJAY SABNIS'
            ],
            [
                'name' => 'Mathematics-III',
                'course_code' => 'BCA-S210',
                'department' => 'BCA',
                'semester' => 'IV',
                'professor' => 'MR. VIKASH CHANDRA SHARMA'
            ],
            [
                'name' => 'Computer Laboratory and Practical Work of Computer Graphics & Multimedia Application',
                'course_code' => 'BCA-S206P',
                'department' => 'BCA',
                'semester' => 'IV',
                'professor' => '--'
            ],
        ];
        foreach ($courses as $key => $value) {
            Courses::create($value);
        }
    }
}
