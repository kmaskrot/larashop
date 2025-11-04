<?php

namespace Database\Factories;

use App\Models\ProductProductCollection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductProductGroupFactory extends Factory
{
    protected $model = ProductProductCollection::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
