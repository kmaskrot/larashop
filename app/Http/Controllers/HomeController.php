<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\ProductService;

class HomeController extends Controller {
    public function index() {
        return view('components.pages.home', [
            'popularCategories' => CategoryService::getPopularCategories(),
            'newProducts' => ProductService::getNewProducts(),
            'collections' => ProductService::getCollections(),
        ]);
    }
}