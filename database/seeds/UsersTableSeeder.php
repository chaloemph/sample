<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'lipeferry',
            'email' => 'lipeferry@mail.com',
            'password' =>  Hash::make('lipeferry'),
        ]);

    }
}
