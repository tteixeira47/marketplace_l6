<?php

use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = \App\Store::all(); // Seleciona todas as lojas do banco

        foreach ($stores as $store) {
            $store->products()->save(factory(\App\Product::class)->make()); // Add um produto pra cada loja
        }
    }
}
