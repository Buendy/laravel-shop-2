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
        factory(\App\User::class, 1)->create([
            'name'  => 'Carlos',
            'email' =>  'iescierva.carlos@gmail.com',
            'password'  => bcrypt('123456'),
            'username' => 'Buendy',
            'admin' => true
        ]);

        factory(\App\User::class, 10)->create();
    }
}
