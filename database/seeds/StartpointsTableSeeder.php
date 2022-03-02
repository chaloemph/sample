<?php

use Illuminate\Database\Seeder;

class StartpointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // App\Startpoint::create([
        //     'name' => 'หาดใหญ่ ตัวเมือง',
        //     'status' => 1,
        // ]);

        // App\Startpoint::create([
        //     'name' => 'ตรัง ตัวเมือง',
        //     'status' => 1,
        // ]);

        App\Startpoint::create([
            'name' => 'สนามบิน หาดใหญ่',
            'status' => 1,
        ]);

        App\Startpoint::create([
            'name' => 'สนามบิน ตรัง',
            'status' => 1,
        ]);

        // App\Startpoint::create([
        //     'name' => 'ท่าเรือปากบารา สตูล',
        //     'status' => 1,
        // ]);

        // App\Startpoint::create([
        //     'name' => 'เกาะหลีเป๊ะ',
        //     'status' => 1,
        // ]);
    }
}
