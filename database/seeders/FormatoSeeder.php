<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formatos')->insert([
            'descripcion' => 'Balde',
            'unidades'=> 'kilos',
            'cantidad' => '5'
        ]);
        DB::table('formatos')->insert([
            'descripcion' => 'Balde',
            'unidades'=> 'kilos',
            'cantidad' => '10'
        ]);
        DB::table('formatos')->insert([
            'descripcion' => 'Bidon',
            'unidades'=> 'litros',
            'cantidad' => '1'
        ]);
        DB::table('formatos')->insert([
            'descripcion' => 'Bidon',
            'unidades'=> 'litros',
            'cantidad' => '5'
        ]);
        DB::table('formatos')->insert([
            'descripcion' => 'Botella',
            'unidades'=> 'litros',
            'cantidad' => '1'
        ]);
    }
}
