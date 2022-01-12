<?php

namespace Database\Factories;

use App\Models\Consumo;
use App\Models\Repostaje;
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
            'faecha' => $this->faker->date(),


        ];
    }
}
