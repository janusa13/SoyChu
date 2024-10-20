<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'descripcion' => $this->faker->sentence(6, true),
            'rubro' => $this->faker->randomElement(['pollos', 'lacteos', 'rebosados', 'otros']),
        ];
    }
}
