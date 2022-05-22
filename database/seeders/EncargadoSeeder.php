<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EncargadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('encargados')->insert([
            'pedido_id' => '1',
            'presentacion_id' => '1',
            'cantidad' => '3'
        ]);
        DB::table('encargados')->insert([
            'pedido_id' => '1',
            'presentacion_id' => '2',
            'cantidad' => '3'
        ]);
    }
}
