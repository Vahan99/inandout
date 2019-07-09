<?php

use Illuminate\Database\Seeder;

class RoomTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room_types = [
            'Superior Room',
            'Executive Room',
            'Pacific Room',
            'Pacific Suite',
            'Deluxe Suite',
            'Executive Suite',
            'Presidential Suite'
        ];

        foreach($room_types as $type) {
            \App\RoomType::create([
                'name_hy' => $type,
                'name_en' => $type,
                'name_ru' => $type,
            ]);
        }
    }
}
