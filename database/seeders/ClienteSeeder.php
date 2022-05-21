<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'nombre' => 'Franco Manuel',
            'apellido'=> 'Ringhetti',
            'documento_tipo' => 'DNI',
            'documento_numero' => '41547459',
            'email' => 'francuito473@gmail.com',
            'telefono' => '+5492914728941',
            'direccion' => 'Falcon 473',
            'IVA' => 'Cons. Final',
            'CUIT' => '20415474599',
            'password' => '12345678'
        ]);
    }
}
