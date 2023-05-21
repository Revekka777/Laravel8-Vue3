<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tag = $this->faker->word;
        while (Tag::where('label', '=', $tag)->exists()){
            $tag = $this->faker->word;
        }
        return [
            'label' => $tag
        ];
    }
}
