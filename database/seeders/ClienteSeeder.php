<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'nombre' => 'cliente1',
            'ci' => '10384950',
            'direccion' => 'recoleta',
            'correo' => 'cliente1@gmail.com',
            'telefono' => '71173944',
        ]);

        Cliente::create([
            'nombre' => 'cliente2',
            'ci' => '10384350',
            'direccion' => 'abra',
            'correo' => 'cliente2@gmail.com',
            'telefono' => '71123944',

        ]);
        Cliente::create([
            'nombre' => 'cliente3',
            'ci' => '10323950',
            'direccion' => 'olaneta',
            'correo' => 'cliente3@gmail.com',
            'telefono' => '73273944',

        ]);
        Cliente::create([
            'nombre' => 'cliente4',
            'ci' => '10382350',
            'direccion' => 'grau',
            'correo' => 'cliente4@gmail.com',
            'telefono' => '72373944',

        ]);
        Cliente::create([
            'nombre' => 'cliente5',
            'ci' => '10384550',
            'direccion' => 'man cesped',
            'correo' => 'cliente5@gmail.com',
            'telefono' => '74673944',

        ]);
        Cliente::create([
            'nombre' => 'cliente6',
            'ci' => '10384942',
            'direccion' => 'marcelo quiroga santa cruz',
            'correo' => 'cliente6@gmail.com',
            'telefono' => '71173264',

        ]);
        Cliente::create([
            'nombre' => 'cliente7',
            'ci' => '103863950',
            'direccion' => 'loa',
            'correo' => 'cliente7@gmail.com',
            'telefono' => '76343944',

        ]);
        Cliente::create([
            'nombre' => 'cliente8',
            'ci' => '10346950',
            'direccion' => 'aniceto arce',
            'correo' => 'cliente8@gmail.com',
            'telefono' => '71173235',

        ]);
        Cliente::create([
            'nombre' => 'cliente9',
            'ci' => '10348950',
            'direccion' => 'arenales',
            'correo' => 'cliente9@gmail.com',
            'telefono' => '71943944',

        ]);
        Cliente::create([
            'nombre' => 'cliente10',
            'ci' => '10384450',
            'direccion' => 'azurduy',
            'correo' => 'cliente10@gmail.com',
            'telefono' => '73773944',

        ]);
        Cliente::create([
            'nombre' => 'cliente11',
            'ci' => '103632450',
            'direccion' => 'potosi',
            'correo' => 'cliente11@gmail.com',
            'telefono' => '71174634',

        ]);

    }
}
