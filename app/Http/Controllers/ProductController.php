<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCollection;
use App\Models\ProductSize;
use Illuminate\View\View;

#[Symfony\Component\HttpKernel\Attribute\AsController('rvzerv')]
class ProductController extends Controller
{
    /**
     * @param ProductCategory $category
     * @return View
     */
    public function categories(ProductCategory $category): View
    {
        return view('components.pages.products.list', [
            'category' => $category,
            'collection' => null,
            'searchQuery' => null
        ]);
    }

    /**
     * @param ProductCollection $collection
     * @return View
     */
    public function collections(ProductCollection $collection): View
    {
        return view('components.pages.products.list', [
            'category' => null,
            'collection' => $collection,
            'searchQuery' => null
        ]);
    }

    /**
     * @return View
     */
    public function list(): View
    {
        return view('components.pages.products.list', [
            'category' => null,
            'collection' => null,
            'searchQuery' => request()->query('search')
        ]);
    }

    /**
     * @param Product $product
     * @return View
     */
    public function detail(Product $product): View
    {
        $productType = $product->apparel->name === 'shoes' ? 'shoes' : 'clothes';
        $availableSizes = $product->inventories()
            ->leftJoin('product_sizes',
                'product_inventories.product_size_id',
                '=',
                'product_sizes.id'
            )
            ->where('stock', '>', 0)
            ->get()
            ->pluck('size')
            ->toArray();

        $sizes = ProductSize::whereType($productType)
            ->orderBy('order')
            ->get();

        return view('components.pages.products.detail', [
            'product' => $product,
            'sizes' => $sizes,
            'availableSizes' => $availableSizes,
            'otherProducts' => Product::whereRef($product->ref)->whereNotIn('id', [$product->id])->get()
        ]);
    }
}
