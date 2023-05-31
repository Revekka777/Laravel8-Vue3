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
        $tag = $this->faker->words(2,true);
        while (Tag::where('label', '=', $tag)->exists()){
            $tag = $this->faker->words(2,true);
        }
        return [
            'label' => $tag
        ];
    }
}
