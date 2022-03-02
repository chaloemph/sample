<?php

use Illuminate\Database\Seeder;

class ScheduleservicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Scheduleservice::create([
            'title' => 'ตารางเรือ',
            'description' => 'ตารางเรือ',
        ]);

        App\Scheduleservice::create([
            'title' => 'ตารางรถโดยสาร',
            'description' => 'ตารางรถโดยสาร',
        ]);

        App\Scheduleservice::create([
            'title' => 'ตารางเครื่องบิน',
            'description' => 'ตารางเครื่องบิน',
        ]);
    }
}
