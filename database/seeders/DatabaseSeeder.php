<?php

namespace Database\Seeders;

use App\Models\Vote;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(MemeSeeder::class);
        $this->call(VoteSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
