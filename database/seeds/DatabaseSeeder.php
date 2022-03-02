<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(ShipsTableSeeder::class);
        $this->call(VehiclesTableSeeder::class);
        $this->call(TripsTableSeeder::class);
        $this->call(StartpointsTableSeeder::class);
        $this->call(EndpointsTableSeeder::class);
        $this->call(ShipschedulesTableSeeder::class);
        $this->call(VehiclepointsTableSeeder::class);
        $this->call(VehicleschedulesTableSeeder::class);
        $this->call(PaymenttypesTableSeeder::class);
        $this->call(PaymentbankingsTableSeeder::class);
        $this->call(BlogservicesTableSeeder::class);
        $this->call(ScheduleservicesTableSeeder::class);
        
        

        
    }
}
