<?php

namespace App\Services;


use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCollection;
use App\Models\ProductSize;
use Carbon\Carbon;

class ProductService
{
    /**
     * @return Product[]
     */
    public static function getNewProducts(int $days = 7, int $limit = 10): array
    {
        return Product::whereBetween('created_at', [
            Carbon::now()->subDays($days), Carbon::now()
        ])->limit($limit)
            ->get()
            ->all();
    }

    /**
     * @return ProductCollection[]
     */
    public static function getCollections(int $limit = 10): array
    {
        return ProductCollection::limit($limit)->get()->all();
    }


    /**
     * @param ProductCategory|null $category
     * @return ProductCategory[]
     */
    public static function getFilters(?ProductCategory $category): array
    {
        $types = ProductCategory::select('type')->distinct()->get();
        $filters = [];
        foreach ($types as $type) {
            if ($category ) {
                if($category->type !== $type->type){
                    $filters[$type->type] = ProductCategory::whereType($type->type)->get()->all();
                }
            }else{
                $filters[$type->type] = ProductCategory::whereType($type->type)->get()->all();
            }
        }

        return $filters;
    }


    /**
     * @param ProductCategory|null $category
     * @return ProductSize[]
     */
    public static function getSizes(?ProductCategory $category): array
    {
        if(!$category){
            return [];
        }
        if ($category->type === 'apparel') {
            if ($category->name !== 'shoes') {
                return ProductSize::whereType('clothes')->get()->all();
            }
            return ProductSize::whereType('shoes')->get()->all();
        }

        return [];
    }


    /**
     * @param string|null $search
     * @param ProductCategory|null $category
     * @param ProductCollection|null $collection
     * @param array|null $genders
     * @param array|null $apparel
     * @param array|null $sports
     * @param array|null $sizes
     * @param string $orderType
     * @param string $orderField
     * @param int $limit
     * @return array
     */
    public static function search(
        ?string $search,
        ?ProductCategory   $category,
        ?ProductCollection $collection,
        ?array             $genders,
        ?array             $apparel,
        ?array             $sports,
        ?array             $sizes,
        string             $orderType = 'ASC',
        string             $orderField = 'name',
        int                $limit = 9,
    ): array
    {
        if (!$category && !$collection && !$genders && !$apparel && !$sports && !$sizes && !$search) {
            return [];
        }

        $query = Product::query();

        if ($category) {
            $types = ProductCategory::select('type')->distinct()->get()->pluck('type')->toArray();

            //Retrieve all products by category
            if (in_array($category->type, $types, true)) {

                $query = Product::whereHas($category->type, static function ($query) use ($category) {
                    $query->whereUuid($category->uuid);
                });
            }
        }

        if($collection){
            $query = Product::whereHas('collections', static function ($query) use ($collection) {
                $query->where('id', $collection->id);
            });
        }

        if($search){
            $products = Product::search($search)->get()->pluck('uuid')->toArray();
            $query = Product::whereIn('uuid', $products);
        }
       if($sizes){
           $query->whereHas('inventories', static function ($query) use ($sizes) {
               $query->whereHas('size', static function ($query) use ($sizes) {
                   $query->whereIn('uuid', $sizes);
               });
           });
       }
        return  $query->filters('gender', $genders)
            ->filters('apparel', $apparel)
            ->filters('filter', $sports)
            ->limit($limit)
            ->orderBy($orderField, $orderType)
            ->get()
            ->all();
    }

}
