<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(MarcaSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(FormatoSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(PresentacionSeeder::class);
    }
}
