<?php

namespace Database\Factories;

use App\Models\Consumo;
use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;

class ConsumoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Consumo::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        $faker = Faker\Factory::create('es_ES');

        return [
            'kilometros' => $this->faker->numberBetween(10,5000),
            'litros' => $this->faker->numberBetween(0,500),
            'coste_litro'=>  $this->faker->randomFloat(2, 0.99, 1.99),
            'origen' => $faker->state(),
            'destino' => $faker->state(),
            'fecha' => $faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d H:i:s'),
            'carburante' =>  $this->faker->randomElement(['gasolina 95', 'gasoleao a', 'gasolina 98', 'gasoleo a+']),
            'id_vehiculo'  => Vehiculo::pluck('id_vehiculo')->random(),
        ];
    }
}
