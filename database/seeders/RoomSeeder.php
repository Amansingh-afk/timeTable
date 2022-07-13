<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $room = [
            [
                'name' => '101',
                'capacity' => '100',
                'type' => 'Non AC',
                'isActive' => '1',
            ],
            [
                'name' => '102',
                'capacity' => '100',
                'type' => 'Non AC',
                'isActive' => '1',
            ],
            [
                'name' => '103',
                'capacity' => '100',
                'type' => 'Non AC',
                'isActive' => '0',
            ],
            [
                'name' => '104',
                'capacity' => '100',
                'type' => 'Non AC',
                'isActive' => '0',
            ],
            [
                'name' => '105',
                'capacity' => '100',
                'type' => 'Non AC',
                'isActive' => '1',
            ],
            [
                'name' => '106',
                'capacity' => '100',
                'type' => 'Non AC',
                'isActive' => '1',
            ],
            [
                'name' => '201',
                'capacity' => '100',
                'type' => 'Non AC',
                'isActive' => '0',
            ],
            [
                'name' => '202',
                'capacity' => '100',
                'type' => 'Non AC',
                'isActive' => '0',
            ],
            [
                'name' => '203',
                'capacity' => '100',
                'type' => 'Non AC',
                'isActive' => '1',
            ],
            [
                'capacity' => '204',
                'name' => '101',
                'type' => 'Non AC',
                'isActive' => '1',
            ],
            [
                'name' => '205',
                'capacity' => '100',
                'type' => 'Non AC',
                'isActive' => '0',
            ],
            [
                'name' => '206',
                'capacity' => '100',
                'type' => 'Non AC',
                'isActive' => '0',
            ],
            [
                'name' => '301',
                'capacity' => '100',
                'type' => 'Non AC',
                'isActive' => '1',
            ],
            [
                'name' => '302',
                'capacity' => '100',
                'type' => 'Non AC',
                'isActive' => '1',
            ],
            [
                'name' => '303',
                'capacity' => '100',
                'type' => 'Non AC',
                'isActive' => '0',
            ],
            [
                'name' => '304',
                'capacity' => '100',
                'type' => 'Non AC',
                'isActive' => '0',
            ],
            [
                'name' => '305',
                'capacity' => '100',
                'type' => 'Non AC',
                'isActive' => '1',
            ],
            [
                'name' => '306',
                'capacity' => '100',
                'type' => 'Non AC',
                'isActive' => '1',
            ],
            [
                'name' => '401',
                'capacity' => '100',
                'type' => 'AC',
                'isActive' => '0',
            ],
            [
                'name' => '402',
                'capacity' => '100',
                'type' => 'AC',
                'isActive' => '0',
            ],
            [
                'name' => '403',
                'capacity' => '100',
                'type' => 'AC',
                'isActive' => '1',
            ],
            [
                'name' => '404',
                'capacity' => '100',
                'type' => 'AC',
                'isActive' => '1',
            ],
            [
                'name' => '405',
                'capacity' => '100',
                'type' => 'AC',
                'isActive' => '0',
            ],
            [
                'name' => '406',
                'capacity' => '100',
                'type' => 'AC',
                'isActive' => '0',
            ],
            [
                'name' => '501',
                'capacity' => '100',
                'type' => 'AC',
                'isActive' => '1',
            ],
            [
                'name' => '502',
                'capacity' => '100',
                'type' => 'AC',
                'isActive' => '1',
            ],
            [
                'name' => '503',
                'capacity' => '100',
                'type' => 'AC',
                'isActive' => '0',
            ],
        ];
        foreach ($room as $key => $value) {
            Room::create($value);
        }
    }
}
