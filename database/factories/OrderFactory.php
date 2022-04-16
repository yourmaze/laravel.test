<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'crm_order_number' => $this->faker->asciify('********************'),
            'weight' => $this->faker->randomFloat(null, 50, 1000),
            'project_id' => rand(1,2),
        ];
    }

}
