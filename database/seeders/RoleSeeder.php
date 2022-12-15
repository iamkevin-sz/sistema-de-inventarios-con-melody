<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);

        $role->permissions()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]);

        $role = Role::create(['name' => 'vendedor']);
        // agreagaremos de otra manera los permisos con lo que nos brinda laravel permisos, con syncPermissions, es igual a la del attach solo que aqui no le pasaremos el id del permiso si no los nombres que le dimos a los permisos

        $role->syncPermissions(['crear categorias', 'mostrar categorias', 'eliminar categorias', 'editar categorias', 'ver dashboard']);



    }
}
