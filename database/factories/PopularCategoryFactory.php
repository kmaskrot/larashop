<?php

namespace Database\Factories;

use App\Models\PopularCategory;
use App\Models\ProductCategory;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PopularCategoryFactory extends Factory
{
    protected $model = PopularCategory::class;

    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'order' => $this->faker->numberBetween(1, 100),
            'product_category_id' => ProductCategory::inRandomOrder()->value('id'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
