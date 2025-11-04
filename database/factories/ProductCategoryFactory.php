<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductCategoryFactory extends Factory
{
    use HasSlug;
    protected $model = ProductCategory::class;

    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'type' => $this->faker->word(),
            'name' => $this->faker->word(),
            'image_path' => $this->faker->imageUrl(),
            'alt' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
