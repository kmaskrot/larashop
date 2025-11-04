<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductInventory;
use App\Models\ProductSize;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Random\RandomException;

class ProductInventoryFactory extends Factory
{
    protected $model = ProductInventory::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        $productSizesShoes = ProductSize::whereType('shoes')->get();
        $productSizesClothes = ProductSize::whereType('clothes')->get();
        $product = Product::inRandomOrder()->first();

        $randomSize = $product->apparel->name === 'shoes' ?
            $productSizesShoes->random() : $productSizesClothes->random();

        return [
            'uuid' => $this->faker->uuid(),
            'product_size_id' => $randomSize->id,
            'product_id' => $product->id,
            'stock' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
