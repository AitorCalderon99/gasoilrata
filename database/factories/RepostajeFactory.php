<?php

namespace Database\Factories;

use App\Models\Repostaje;
use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Factories\Factory;

class RepostajeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Repostaje::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'combustible' =>  $this->faker->randomElement(['gasolina 95', 'gasoleao a', 'gasolina 98', 'gasoleo a+']),
            'fecha' => $this->faker->date(),
            'gasolinera' => $this->faker->sentence,
            'litros' => $this->faker->numberBetween(0,500),
            'precio_litro'=> $this->faker->numberBetween(0.90,1.90),
            'id_vehiculo'  => Vehiculo::pluck('id_vehiculo')->random(),

        ];
    }
}
