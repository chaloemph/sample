<?php

use Illuminate\Database\Seeder;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicletype = App\Vehicletype::create([
            'name' => 'Join จอย',
        ]);

        App\Vehicle::create([
            'name' => 'รถตู้ ธรรมดา (13 ที่นั่ง)',
            'price' => 1000,
            'vehicletype_id' => $vehicletype->id,
        ]);

        App\Vehicle::create([
            'name' => 'รถตู้ VIP (9 ที่นั่ง)',
            'price' => 1200,
            'vehicletype_id' => $vehicletype->id,
        ]);



        $vehicletype = App\Vehicletype::create([
            'name' => 'Rent เหมา',
        ]);

        App\Vehicle::create([
            'name' => 'รถตู้ ธรรมดา (13 ที่นั่ง)',
            'price' => 10000,
            'vehicletype_id' => $vehicletype->id,
        ]);

        App\Vehicle::create([
            'name' => 'รถตู้ VIP (9 ที่นั่ง)',
            'price' => 12000,
            'vehicletype_id' => $vehicletype->id,
        ]);

        App\Vehicle::create([
            'name' => 'รถโดยสาร (SUV) (3 ที่นั่ง)',
            'price' => 2500,
            'vehicletype_id' => $vehicletype->id,
        ]);

        App\Vehicle::create([
            'name' => 'รถโดยสาร (SUV) (4 ที่นั่ง)',
            'price' => 2000,
            'vehicletype_id' => $vehicletype->id,
        ]);

        App\Vehicle::create([
            'name' => 'Taxi',
            'price' => 1500,
            'vehicletype_id' => $vehicletype->id,
        ]);
    }
}
