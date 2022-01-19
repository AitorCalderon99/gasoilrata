<?php

namespace Database\Seeders;

use App\Models\Repostaje;
use Illuminate\Database\Seeder;

class RepostajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Repostaje::factory()->count(10)->create();
    }
}
