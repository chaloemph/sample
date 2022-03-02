<?php

use Illuminate\Database\Seeder;

class ShipschedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $ships = App\Ship::all();
        foreach($ships as $ship) {
            App\Shipschedule::create([
                'starttime' => '09:00:00',
                'starttime_expected' => '10:30',
                'ship_id' => $ship->id,
                'type' => 'go',
                'startpoint' => 'ปากบารา',
                'endpoint' => 'หลีเป๊ะ',
            ]);


            App\Shipschedule::create([
                'starttime' => '09:00:00',
                'starttime_expected' => '10:30',
                'ship_id' => $ship->id,
                'type' => 'back',
                'startpoint' => 'หลีเป๊ะ',
                'endpoint' => 'ปากบารา',
            ]);


            App\Shipschedule::create([
                'starttime' => '11:30:00',
                'starttime_expected' => '13:00',
                'ship_id' => $ship->id,
                'type' => 'go',
                'startpoint' => 'ปากบารา',
                'endpoint' => 'หลีเป๊ะ',
            ]);

            App\Shipschedule::create([
                'starttime' => '13:30:00',
                'starttime_expected' => '15:00',
                'ship_id' => $ship->id,
                'type' => 'back',
                'startpoint' => 'หลีเป๊ะ',
                'endpoint' => 'ปากบารา',
            ]);
        }
        
    }
}
