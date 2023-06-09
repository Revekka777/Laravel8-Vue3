<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(6,true);
        $slug = Str::substr(Str::lower(preg_replace('/\s+/', '-', $title)), 0,-1);


        return [
            'title' => $title,
            'body' => $this->faker->text(300),
            'slug' => $slug,
            'img' => 'https://via.placeholder.com/600/5F1138/FFFFFF/?text=LARAVEL:8.*',
            'published_at' => Carbon::now(),
            'created_at' => $this->faker->dateTimeBetween('-1 years')
        ];
    }
}
