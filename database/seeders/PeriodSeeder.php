<?php

namespace Database\Seeders;

use App\Models\period;
use App\Models\Professor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periods = [
            [
                'start_time' => '10: 10 am',
                'end_time' => '11: 00 am',
                'AM_PM' => 'AM',
                'period_number' => '1',
            ],
            [
                'start_time' => '11: 00 am',
                'end_time' => '11: 50 am',
                'AM_PM' => 'AM',
                'period_number' => '2',
            ],
            [
                'start_time' => '11: 50 am',
                'end_time' => '12: 40 pm',
                'AM_PM' => 'AM',
                'period_number' => '3',
            ],
            [
                'start_time' => '12: 40 pm',
                'end_time' => '01: 30 pm',
                'AM_PM' => 'AM',
                'period_number' => '4',
            ],
            [
                'start_time' => '01: 30 pm',
                'end_time' => '02: 20 pm',
                'AM_PM' => 'AM',
                'period_number' => '5',
            ],
            [
                'start_time' => '02: 20 pm',
                'end_time' => '03: 10 pm',
                'AM_PM' => 'AM',
                'period_number' => '6',
            ],
            [
                'start_time' => '03: 10 pm',
                'end_time' => '04: 00 pm',
                'AM_PM' => 'PM',
                'period_number' => '7',
            ]
        ];
        foreach ($periods as $key => $value) {
            period::create($value);
        }
    }
}
