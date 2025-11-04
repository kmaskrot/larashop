<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductReview;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductReviewFactory extends Factory
{
    protected $model = ProductReview::class;

    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'user_id' => User::inRandomOrder()->value('id'),
            'review' => $this->faker->realText(),
            'rating' => $this->faker->numberBetween(0, 5),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
