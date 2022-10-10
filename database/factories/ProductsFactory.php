<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(mt_rand(2, 10)),
            'category_id' => mt_rand(1, 3),
            'user_id' => mt_rand(1, 3),
            'slug' => $this->faker->slug(),
            'file' => 'models/ishana.glb'
        ];
    }
}
