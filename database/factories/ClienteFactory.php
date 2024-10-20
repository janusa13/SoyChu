<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'provincia' => $this->faker->state,
            'localidad' => $this->faker->city,
            'calleYNumero' => $this->faker->streetAddress,
            'codigoPostal' => $this->faker->postcode,
            'cuit' => $this->faker->numerify('##-########-#'),
            'categoriaIVA' => $this->faker->randomElement(['Responsable Inscripto', 'Monotributista']),
            'correoElectronico' => $this->faker->safeEmail,
            'numeroCelular' => $this->faker->phoneNumber,
            'celularLaboral' => $this->faker->phoneNumber,
            'nombreFantasia' => $this->faker->company,
        ];
    }
}
