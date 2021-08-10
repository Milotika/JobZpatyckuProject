<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Meme;
class MemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meme::factory()->count(150)->create();
    }
}
