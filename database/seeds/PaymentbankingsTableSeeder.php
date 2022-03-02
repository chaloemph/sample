<?php

use Illuminate\Database\Seeder;

class PaymentbankingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Paymentbanking::create([
            'account_number' => '035-8-86210-1',
            'account_name' => 'คุณอานนท์ บุญมา',
            'bank_name' => 'กสิกร',
            'bank_img' => 'kbank.png',
            'status' => 1,
        ]);

        App\Paymentbanking::create([
            'account_number' => '901-3-46462-9',
            'account_name' => 'คุณอานนท์ บุญมา',
            'bank_name' => 'กรุงไทย',
            'bank_img' => 'ktb.png',
            'status' => 1,
        ]);

        App\Paymentbanking::create([
            'account_number' => '864-222-698-9',
            'account_name' => 'คุณอานนท์ บุญมา',
            'bank_name' => 'ไทยพาณิชย์',
            'bank_img' => 'scb.png',
            'status' => 1,
        ]);

        App\Paymentbanking::create([
            'account_number' => '020179401334',
            'account_name' => 'คุณอานนท์ บุญมา',
            'bank_name' => 'ออมสิน',
            'bank_img' => 'gsb.png',
            'status' => 1,
        ]);

        App\Paymentbanking::create([
            'account_number' => '455-049-583-4',
            'account_name' => 'คุณอานนท์ บุญมา',
            'bank_name' => 'กรุงเทพ',
            'bank_img' => 'bk.png',
            'status' => 1,
        ]);
    }
}
