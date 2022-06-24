<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'nombre' => 'Dulce de leche'
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Crema'
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Queso crema'
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Queso cremoso'
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Leche'
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Yogurt'
        ]);
    }
}
