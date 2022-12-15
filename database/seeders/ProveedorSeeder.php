<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proveedor;
class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proveedor::create([

            'nombre' => 'dario',
            'ciudad' => 'sucre',
            'nit' => '103234',
            'correo' => 'dario@gmail.com',
            'direccion' => 'abra',
            'telefono' => '1234123',
        ]);

        Proveedor::create([

            'nombre' => 'ariel',
            'ciudad' => 'sucre',
            'nit' => '2134123',
            'correo' => 'ariel@gmail.com',
            'direccion' => 'azari',
            'telefono' => '7273727',
        ]);

        Proveedor::create([

            'nombre' => 'Luis',
            'ciudad' => 'La Paz',
            'nit' => '34123',
            'correo' => 'Luis@gmail.com',
            'direccion' => 'vaca guzman',
            'telefono' => '252453',
        ]);

        Proveedor::create([

            'nombre' => 'alberto',
            'ciudad' => 'potosi',
            'nit' => '213412',
            'correo' => 'alberto@gmail.com',
            'direccion' => 'avenida potosi',
            'telefono' => '23142',
        ]);

        Proveedor::create([

            'nombre' => 'Emilio',
            'ciudad' => 'Santa Cruz',
            'nit' => '3245',
            'correo' => 'Emilio@gmail.com',
            'direccion' => 'pirai',
            'telefono' => '234532',
        ]);
    }
}
