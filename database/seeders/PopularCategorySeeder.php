<?php

namespace Database\Seeders;


use App\Models\PopularCategory;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class PopularCategorySeeder extends Seeder
{
    public function run(): void
    {
        PopularCategory::factory()
            ->count(8)
            ->sequence(
                [
                    'product_category_id' => ProductCategory::whereName('women')->first()->id,
                    'order' => 1,
                ],
                [
                    'product_category_id' => ProductCategory::whereName('men')->first()->id,
                    'order' => 2,
                ],
                [
                    'product_category_id' => ProductCategory::whereName('kids')->first()->id,
                    'order' => 3,
                ],
                [
                    'product_category_id' => ProductCategory::whereName('t-shirts')->first()->id,
                    'order' => 4,
                ],
                [
                    'product_category_id' => ProductCategory::whereName('jackets')->first()->id,
                    'order' => 5,
                ],
                [
                    'product_category_id' => ProductCategory::whereName('pants')->first()->id,
                    'order' => 6,
                ],
                [
                    'product_category_id' => ProductCategory::whereName('shoes')->first()->id,
                    'order' => 7,
                ],
                [
                    'product_category_id' => ProductCategory::whereName('accessories')->first()->id,
                    'order' => 8,
                ],
            )->create();
    }
}
