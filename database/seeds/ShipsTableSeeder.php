<?php

use Illuminate\Database\Seeder;

class ShipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shiptype = App\Shiptype::create([
            'name' => 'Speed Boat',
        ]);

        App\Ship::create([
            'name' => 'Speed Boat',
            'price' => 900,
            'shiptype_id' => $shiptype->id,
        ]);

        $shiptype = App\Shiptype::create([
            'name' => 'Ferry Boat',
        ]);

        App\Ship::create([
            'name' => 'Ferry Boat',
            'price' => 1000,
            'shiptype_id' => $shiptype->id,
        ]);

    }
}
