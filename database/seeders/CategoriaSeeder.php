<?php

namespace Database\Seeders;
use App\Models\Categoria;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre' => 'accesorios',
            'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem quasi officiis similique',
        ]);

        Categoria::create([
            'nombre' => 'computadoras',
            'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem quasi officiis similique',
        ]);

        Categoria::create([
            'nombre' => 'cables',
            'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem quasi officiis similique',
        ]);

        Categoria::create([
            'nombre' => 'tarjetas de video',
            'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem quasi officiis similique',
        ]);

        Categoria::create([
            'nombre' => 'Gabinetes',
            'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem quasi officiis similique',
        ]);

        Categoria::create([
            'nombre' => 'Discos Duros Externos',
            'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem quasi officiis similique',
        ]);

        Categoria::create([
            'nombre' => 'monitores',
            'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem quasi officiis similique',
        ]);

        Categoria::create([
            'nombre' => 'laptops',
            'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem quasi officiis similique',
        ]);

        Categoria::create([
            'nombre' => 'pc de escritorio',
            'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem quasi officiis similique',
        ]);

        Categoria::create([
            'nombre' => 'impresoras',
            'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem quasi officiis similique',
        ]);

        Categoria::create([
            'nombre' => 'cartuchos',
            'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem quasi officiis similique',
        ]);
    }
}
