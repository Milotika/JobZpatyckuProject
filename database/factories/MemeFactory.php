<?php

namespace Database\Factories;

use App\Models\Meme;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Meme::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = [
            'ciekatowski',
            'gry',
            'sport',
            'film',
            'zwierzeta',
            'humor',
            'polityka',
            'muzyka',
            'czarny-humor',
            'pasty',
            'nauka',
            'pytanie',
            'motoryzacja',
        ];
        return [
            'user_id' => rand(1,100),
            'title' => $this->faker->text(40),
            'category' => $category[array_rand($category)],
            'file_patch' =>  'img/mem.png',
            'vote_count' => rand(1,2000),
            'comment_count' => rand(1,200),
        ];
    }
}
