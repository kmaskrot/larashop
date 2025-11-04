<?php

namespace Database\Factories;

use App\Models\ShoppingCart;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ShoppingCartFactory extends Factory
{
    protected $model = ShoppingCart::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomNumber(),
            'product_size_id' => $this->faker->randomNumber(),
            'quantity' => $this->faker->randomNumber(),
            'price' => $this->faker->randomFloat(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
