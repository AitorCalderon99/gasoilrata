<?php

namespace Database\Seeders;

use App\Models\Consumo;
use Illuminate\Database\Seeder;

class ConsumoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Consumo::factory()->count(10)->create();

    }
}
