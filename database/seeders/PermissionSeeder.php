<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // categorias
        Permission::create([
            'name' => 'crear categorias',
        ]);

        Permission::create([
            'name' => 'mostrar categorias',
        ]);

        Permission::create([
            'name' => 'eliminar categorias',
        ]);

        Permission::create([
            'name' => 'editar categorias',
        ]);

        //dashboard

        Permission::create([
            'name' => 'ver dashboard',
        ]);

        //Roles

        Permission::create([
            'name' => 'crear role',
        ]);

        Permission::create([
            'name' => 'listar role',
        ]);

        Permission::create([
            'name' => 'editar role',
        ]);

        Permission::create([
            'name' => 'eliminar role',
        ]);

        //usuarios

        Permission::create([
            'name' => 'listar usuarios',
        ]);

        Permission::create([
            'name' => 'editar usuarios',
        ]);

         //Proveedores
         //Productos
         //clientes
         //ventas
         //Compras
         //reporte por dia
         //reporete por fecha
         //configuracion
         //perdidas
         //detalles

    }
}
