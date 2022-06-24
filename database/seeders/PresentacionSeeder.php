<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PresentacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('presentaciones')->insert([
            'stock' => '10',
            'precio' => '100',
            'producto_id'=> '2',
            'marca_id'=> '1',
            'formato_id' => '1'
        ]);
        DB::table('presentaciones')->insert([
            'stock' => '10',
            'precio' => '100',
            'producto_id'=> '3',
            'marca_id'=> '1',
            'formato_id' => '2'
        ]);
        DB::table('presentaciones')->insert([
            'stock' => '10',
            'precio' => '100',
            'producto_id'=> '2',
            'marca_id'=> '2',
            'formato_id' => '2'
        ]);
        DB::table('presentaciones')->insert([
            'stock' => '10',
            'precio' => '100',
            'producto_id'=> '2',
            'marca_id'=> '1',
            'formato_id' => '1'
        ]);
        DB::table('presentaciones')->insert([
            'stock' => '10',
            'precio' => '100',
            'producto_id'=> '3',
            'marca_id'=> '3',
            'formato_id' => '2'
        ]);
        DB::table('presentaciones')->insert([
            'stock' => '10',
            'precio' => '100',
            'producto_id'=> '4',
            'marca_id'=> '4',
            'formato_id' => '4'
        ]);
    }
}
