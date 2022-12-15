<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;
use App\Models\Proveedor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->randomElement(['computadora hp i5','tarjeta de video nvidia','impresora a color hp','impresora a blanco y negro cannon','tarjeta madre asus','procesador amd','procesador ryzen serie','tarjeta de video gigabyte nvidia', 'gabinetes full tower']),
            'stock' => $this->faker->randomElement(['10','20','30','40','50','60','70']),
            'imagen' => $this->faker->image('public/image'),
            'precio_venta' => $this->faker->randomElement(['1','2','3','4','5','6','7']),
            'estado' => $this->faker->randomElement(['ACTIVADO', 'DESACTIVADO']),
            'categoria_id' => Categoria::all()->random()->id,
            'proveedor_id' => Proveedor::all()->random()->id,
        ];
    }
}
