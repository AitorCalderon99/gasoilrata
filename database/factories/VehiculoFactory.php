<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehiculoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehiculo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_vehiculo'  => Vehiculo::pluck('id_vehiculo')->random(),
            'origen' => $this->faker->name(),
            'id_usuario'  => User::pluck('id_usuario')->random(),
        ];
    }
}