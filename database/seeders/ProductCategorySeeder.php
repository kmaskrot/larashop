<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        ProductCategory::factory()
            ->count(3)
            ->sequence(
                [
                    'type' => 'gender',
                    'name' => 'men',
                    'image_path' => 'resources/assets/categories/genders/man.png',
                    'alt' => 'Men Category',
                ],
                [
                    'type' => 'gender',
                    'name' => 'women',
                    'image_path' => 'resources/assets/categories/genders/woman.png',
                    'alt' => 'Women Category',
                ],
                [
                    'type' => 'gender',
                    'name' => 'mix',
                    'image_path' => 'resources/assets/categories/genders/mix.png',
                    'alt' => 'Mix Category',
                ]
            )->create();

        ProductCategory::factory()
            ->count(8)
            ->sequence(
                [
                    'type' => 'filter',
                    'name' => 'running',
                ],
                [
                    'type' => 'filter',
                    'name' => 'lifestyle',
                ],
                [
                    'type' => 'filter',
                    'name' => 'training and fitness',
                ],
                [
                    'type' => 'filter',
                    'name' => 'football',
                ],
                [
                    'type' => 'filter',
                    'name' => 'basketball',
                ],
                [
                    'type' => 'filter',
                    'name' => 'tennis',
                ],
                [
                    'type' => 'filter',
                    'name' => 'skateboard',
                ],
                [
                    'type' => 'filter',
                    'name' => 'swimming',
                ]
            )->create();

        ProductCategory::factory()
            ->count(8)
            ->sequence(
                [
                    'type' => 'apparel',
                    'name' => 'accessories',
                    'image_path' => 'resources/assets/categories/apparel/accessories.png',
                    'alt' => 'Accessories Category',
                ],

                [
                    'type' => 'apparel',
                    'name' => 'sweaters',
                ],
                [
                    'type' => 'apparel',
                    'name' => 't-shirts',
                    'image_path' => 'resources/assets/categories/apparel/t-shirt.png',
                    'alt' => 'T-shirt Category',
                ],
                [
                    'type' => 'apparel',
                    'name' => 'shoes',
                    'image_path' => 'resources/assets/categories/apparel/shoes.png',
                    'alt' => 'Shoes Category',
                ],
                [
                    'type' => 'apparel',
                    'name' => 'jackets',
                    'image_path' => 'resources/assets/categories/apparel/jacket.png',
                    'alt' => 'Jackets Category',
                ],
                [
                    'type' => 'apparel',
                    'name' => 'pants',
                    'image_path' => 'resources/assets/categories/apparel/pants.png',
                    'alt' => 'Pants Category',
                ],
                [
                    'type' => 'apparel',
                    'name' => 'underwear',
                ],
                [
                    'type' => 'apparel',
                    'name' => 'socks',
                ],

            )->create();

        ProductCategory::factory()
            ->count(1)
            ->sequence(
                [
                    'type' => null,
                    'name' => 'kids',
                    'image_path' => 'resources/assets/categories/kid.png',
                    'alt' => 'Kids Category',
                ],

            )->create();
    }
}
