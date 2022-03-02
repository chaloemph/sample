<?php

use Illuminate\Database\Seeder;

class VehiclepointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $startpoints = App\Startpoint::all();
        $endpoints = App\Endpoint::all();
        foreach($startpoints as $startpoint) {
            foreach($endpoints as $endpoint) {
                App\Vehiclepoint::create([
                    'startpoint' => $startpoint->name,
                    'endpoint' => $endpoint->name,
                ]);
            }
        }
        // App\Vehiclepoint::create([
        //     'startpoint' => 'สนามบินหาดใหญ่',
        //     'endpoint' => 'ปากบารา',
        // ]);

        // App\Vehiclepoint::create([
        //     'startpoint' => 'สะเดา',
        //     'endpoint' => 'ปากบารา',
        // ]);

    }
}
