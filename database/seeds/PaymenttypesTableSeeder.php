<?php

use Illuminate\Database\Seeder;

class PaymenttypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Paymenttype::create([
            'type' => 'โอนเงิน',
        ]);

        App\Paymenttype::create([
            'type' => 'โมบายแบงกิ้ง',
        ]);
        
    }
}
