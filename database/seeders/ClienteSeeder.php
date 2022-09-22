<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'nombre' => 'Natalia',
            'apellido'=> 'Natalia',
            'documento_tipo' => 'DNI',
            'documento_numero' => '69420420',
            'email' => 'NN@gmail.com',
            'telefono' => '',
            'direccion' => '',
            'IVA' => 'Consumidor Final',
            'CUIT' => '20694204209',
            'password' => Hash::make('12345678')
        ]);
    }
}
