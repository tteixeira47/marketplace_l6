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
        factory(\App\User::class, 50)->create()->each(function ($user) {
            $user->store()->save(factory(\App\Store::class)->make()); //A Factory cria uma loja para cada um dos 50 usuarios
        });
    }
}
