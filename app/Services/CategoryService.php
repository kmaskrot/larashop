<?php

namespace App\Services;

use App\Models\PopularCategory;

class CategoryService
{
    /**
     * @return PopularCategory[]
     */
    public static function getPopularCategories(): array
    {
        return PopularCategory::orderBy('order')->get()->all();
    }

}
