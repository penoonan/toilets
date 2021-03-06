<?php

use Illuminate\Database\Seeder;
use Toilets\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Pearl',
            'email' => 'p.e.noonan@gmail.com',
            'password'=> Hash::make('password')
        ]);

        factory(\Toilets\Models\User::class, 50)->create();
    }
}
