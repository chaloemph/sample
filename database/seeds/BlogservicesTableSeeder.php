<?php

use Illuminate\Database\Seeder;

class BlogservicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Blogservice::create([
            'title' => 'บริการเรือ',
            'description' => 'บริการเรือ',
        ]);

        App\Blogservice::create([
            'title' => 'บริการรถโดยสาร',
            'description' => 'บริการรถโดยสาร',
        ]);

        App\Blogservice::create([
            'title' => 'บริการทริปดำน้ำ',
            'description' => 'บริการทริปดำน้ำ',
        ]);
    }
}
