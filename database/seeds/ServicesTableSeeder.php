<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Service::create([
            'name' => 'ship',
            'status' => 1
        ]);

        App\Service::create([
            'name' => 'vehicle',
            'status' => 1
        ]);

        App\Service::create([
            'name' => 'trip',
            'status' => 1
        ]);
    }
}
