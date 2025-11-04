<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCollection;
use App\Models\ProductInventory;
use App\Models\ProductSize;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $productCollections = ProductCollection::factory()
            ->count(5)
            ->sequence(
                [
                    'name' => 'Winter Collection',
                    'alt' => 'Winter Collection Image',
                    'image_path' => 'resources/assets/collections/pic1.jpg',
                    'order' => 1,
                ],
                [
                    'name' => 'Street Vibe Essentials',
                    'alt' => 'Street Vibe Essentials Image',
                    'image_path' => 'resources/assets/collections/pic2.jpg',
                    'order' => 2,
                ],
                [
                    'name' => 'EcoChic Collection',
                    'alt' => 'EcoChic Collection Image',
                    'image_path' => 'resources/assets/collections/pic3.jpg',
                    'order' => 3,
                ],
                [
                    'name' => 'Timeless Classics',
                    'alt' => 'Timeless Classics Image',
                    'image_path' => 'resources/assets/collections/pic4.jpg',
                    'order' => 4,
                ],
                [
                    'name' => 'Retro Revival',
                    'alt' => 'Retro Revival Image',
                    'image_path' => 'resources/assets/collections/pic5.jpg',
                    'order' => 5,
                ],


            )->create();


        Product::factory()
            ->count(50)
            ->hasImages(3)
            ->hasReviews(3)
            ->create()
            ->each(function (Product $product) use ($productCollections) {
                $randomCollections = $productCollections->random(random_int(1, $productCollections->count()));
                $product->collections()->attach($randomCollections, [
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);


            });

        ProductInventory::factory()
            ->count(30)
            ->create();
    }
}
