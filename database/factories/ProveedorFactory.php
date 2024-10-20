<?php

namespace Database\Factories;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
    protected $model = Proveedor::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->company,
            'telefono' => $this->faker->phoneNumber,
            'direccionComercial' => $this->faker->address,
            'CUIT' => $this->faker->numerify('##-########-#'),
            'ciudad' => $this->faker->city,
        ];
    }
}

