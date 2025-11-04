<?php

namespace Database\Factories;

use App\Models\ProductSize;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductSizeFactory extends Factory
{
    protected $model = ProductSize::class;

    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'order' => $this->faker->numberBetween(1, 300),
            'size' => $this->faker->word(),
            'type' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
