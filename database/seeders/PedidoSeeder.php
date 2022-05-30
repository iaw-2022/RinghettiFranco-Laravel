<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pedidos')->insert([
            'cliente_id' => '1',
            'fecha_realizado' => '2022-01-24',
        ]);
        DB::table('pedidos')->insert([
            'cliente_id' => '2',
            'fecha_realizado' => '2022-05-30',
        ]);
        DB::table('pedidos')->insert([
            'cliente_id' => '2',
            'fecha_realizado' => '2022-05-25',
        ]);
        DB::table('pedidos')->insert([
            'cliente_id' => '2',
            'fecha_realizado' => '2022-05-23',
        ]);
    }
}
