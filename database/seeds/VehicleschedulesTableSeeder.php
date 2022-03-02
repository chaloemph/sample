<?php

use Illuminate\Database\Seeder;

class VehicleschedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicles = App\Vehicle::all();
        $vehiclepoints = App\Vehiclepoint::all();
        // $vehiclepoints = App\Vehiclepoint::where('id',1)->get();
        foreach($vehiclepoints as $vehiclepoint){
            foreach($vehicles as $vehicle) {
                App\Vehicleschedule::create([
                    'starttime' => '09:00:00',
                    'starttime_expected' => '10:30',
                    'vehicle_id' => $vehicle->id,
                    'vehiclepoint_id' => $vehiclepoint->id,
                    'type' => 'go',
                ]);
    
    
                App\Vehicleschedule::create([
                    'starttime' => '09:00:00',
                    'starttime_expected' => '10:30',
                    'vehicle_id' => $vehicle->id,
                    'vehiclepoint_id' => $vehiclepoint->id,
                    'type' => 'back',
                ]);
    
    
                App\Vehicleschedule::create([
                    'starttime' => '11:30:00',
                    'starttime_expected' => '13:00',
                    'vehicle_id' => $vehicle->id,
                    'vehiclepoint_id' => $vehiclepoint->id,
                    'type' => 'go',
                ]);
    
                App\Vehicleschedule::create([
                    'starttime' => '13:30:00',
                    'starttime_expected' => '15:00',
                    'vehicle_id' => $vehicle->id,
                    'vehiclepoint_id' => $vehiclepoint->id,
                    'type' => 'back',
                ]);
            }
        } 
    }
}
