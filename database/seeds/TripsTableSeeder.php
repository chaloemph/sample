<?php

use Illuminate\Database\Seeder;

class TripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $triptype = App\Triptype::create([
            'name' => 'Join จอย',
        ]);

        App\Trip::create([
            'name' => 'จอยทริปโซนใน 500 บาท',
            'price' => 500,
            'triptype_id' => $triptype->id,
        ]);

        App\Trip::create([
            'name' => 'จอยทริปโซนใน + โซนนอก 700 บาท',
            'price' => 700,
            'triptype_id' => $triptype->id,
        ]);

        $triptype = App\Triptype::create([
            'name' => 'Rent เหมา',
        ]);

        App\Trip::create([
            'name' => 'เหมาลำ 1-6 ท่าน โซนใน 1,500 บาท',
            'price' => 1500,
            'triptype_id' => $triptype->id,
        ]);

        App\Trip::create([
            'name' => 'เหมาลำ 7-10 ท่าน โซนใน 2,000 บาท ',
            'price' => 2000,
            'triptype_id' => $triptype->id,
        ]);

        App\Trip::create([
            'name' => 'เหมาลำ 1-6 ท่าน โซนนอก 2,000 บาท',
            'price' => 2000,
            'triptype_id' => $triptype->id,
        ]);

        App\Trip::create([
            'name' => 'เหมาลำ 7-10 ท่าน โซนนอก 2,500 บาท',
            'price' => 2500,
            'triptype_id' => $triptype->id,
        ]);

        App\Trip::create([
            'name' => 'เหมาลำ 1-6 ท่าน โซนใน + โซนนอก 2,300 บาท',
            'price' => 2300,
            'triptype_id' => $triptype->id,
        ]);

        App\Trip::create([
            'name' => 'เหมาลำ 7-10 ท่าน โซนใน + โซนนอก 2,800 บาท',
            'price' => 2800,
            'triptype_id' => $triptype->id,
        ]);
    }
}
