<?php

use Illuminate\Database\Seeder;

class EndpointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // App\Endpoint::create([
        //     'name' => 'หาดใหญ่ ตัวเมือง',
        //     'status' => 1,
        // ]);

        // App\Endpoint::create([
        //     'name' => 'ตรัง ตัวเมือง',
        //     'status' => 1,
        // ]);

        // App\Endpoint::create([
        //     'name' => 'สนามบิน หาดใหญ่',
        //     'status' => 1,
        // ]);

        // App\Endpoint::create([
        //     'name' => 'สนามบิน ตรัง',
        //     'status' => 1,
        // ]);

        App\Endpoint::create([
            'name' => 'ท่าเรือปากบารา สตูล',
            'status' => 1,
        ]);

        // App\Endpoint::create([
        //     'name' => 'เกาะหลีเป๊ะ',
        //     'status' => 1,
        // ]);
    }
}
