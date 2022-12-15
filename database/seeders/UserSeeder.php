<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([

        //     'name' => 'Kevin Salazar Zarate',
        //     'email' => 'iamkevinnumber1@gmail.com',
        //     'password' => bcrypt('Kevin123$'),
        // ]);

// le asignaremos un rol
        $user = User::create([
                    'name' => 'Kevin Salazar Zarate',
                    'email' => 'iamkevinnumber1@gmail.com',
                    'password' => bcrypt('Kevin123$'),
                ]);
// LARAVEL permisos da un metodo para asignar por nombres los roles a un usuario que es assignRole
        $user->assignRole('admin');
        User::factory(99)->create();
    }
}
