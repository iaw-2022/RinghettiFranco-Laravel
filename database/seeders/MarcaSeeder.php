<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marcas')->insert([
            'nombre' => 'La Serenisima'
        ]);
        DB::table('marcas')->insert([
            'nombre' => 'Tregar'
        ]);
        DB::table('marcas')->insert([
            'nombre' => 'Las Tres Marias'
        ]);
        DB::table('marcas')->insert([
            'nombre' => 'Sancor'
        ]);
    }
}
