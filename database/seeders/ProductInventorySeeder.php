<?php

namespace Database\Seeders;

use App\Models\ProductColor;
use App\Models\ProductInventory;
use App\Models\ProductSize;
use Illuminate\Database\Seeder;

class ProductInventorySeeder extends Seeder
{
    public function run(): void
    {
        $sizesClothes = [
            'XS',
            'S',
            'M',
            'L',
            'XL',
            'XXL',
            '3XL'
        ];


        ProductSize::factory()
            ->count(7)
            ->sequence(
                ...collect($sizesClothes)->map(fn($size, $key) => ['size' => $size, 'type' => 'clothes','order' => $key])->toArray()
            )
            ->create();

        $sizesShoes = [
            35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5,
            39, 39.5, 40, 40.5, 41, 41.5, 42, 42.5,
            43, 43.5, 44, 44.5, 45, 45.5, 46, 46.5,
            47, 47.5, 48, 48.5, 49, 49.5, 50
        ];

        ProductSize::factory()
            ->count(count($sizesShoes))
            ->sequence(
                ...collect($sizesShoes)->map(fn($size) => ['size' => $size, 'type' => 'shoes', 'order' => $size])->toArray()
            )
            ->create();

        ProductColor::factory()
            ->count(30)
            ->create();

    }
}
