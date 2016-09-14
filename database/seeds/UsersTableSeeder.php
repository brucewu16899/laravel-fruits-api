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
        factory(App\User::class)->create(
        	[
        		'name' => 'Wilson Pinto',
        		'email' => 'wilsonpinto360@gmail.com',
        		'password' => bcrypt('benfica')
        	]
        );

    }
}
