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
        'name'=>'Arul',
        'email'=>'arul@jack.com',
        'password'=>bcrypt('12345678')
        ]);
    }
}
