<?php

namespace Database\Factories;

use App\Models\ProductCollection;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductCollectionFactory extends Factory
{
    use HasSlug;

    protected $model = ProductCollection::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'image_path' => $this->faker->word(),
            'alt' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'order' => $this->faker->randomDigit()
        ];
    }


}
