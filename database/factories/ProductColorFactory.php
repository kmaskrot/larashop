<?php

namespace Database\Factories;

use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductColorFactory extends Factory
{
    protected $model = ProductColor::class;

    public function definition(): array
    {
        return [
            'color_name' => $this->faker->colorName(),
            'hex' => $this->faker->hexColor(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
