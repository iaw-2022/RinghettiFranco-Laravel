<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Marca;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marca::create(array('nombre'=> 'La Serenisima'));
        Marca::create(array('nombre'=> 'Tregar'));
        Marca::create(array('nombre'=> 'Las Tres Marias'));
        Marca::create(array('nombre'=> 'Sancor'));
    }
}
