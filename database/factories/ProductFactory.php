<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductColor;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductFactory extends Factory
{
    use HasSlug;
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'product_apparel_id' => ProductCategory::whereType('apparel')->inRandomOrder()->value('id'),
            'product_filter_id' => ProductCategory::whereType('filter')->inRandomOrder()->value('id'),
            'product_gender_id' => ProductCategory::whereType('gender')->inRandomOrder()->value('id'),
            'product_color_id' => ProductColor::inRandomOrder()->value('id'),
            'image_path' => 'https://picsum.photos/300/300',
            'name' => $this->faker->name(),
            'price' => $this->faker->randomFloat(2, 0, 600),
            'ref' => $this->faker->word(),
            'description' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
