<?php

namespace App\Livewire;

use App\Models\PopularCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCollection;
use Illuminate\View\View;
use Livewire\Component;

class Search extends Component
{

    /**
     * @var bool
     */
    public bool $isMenuActive = false;


    /**
     * @var string
     */
    public string $search = '';

    /**
     * @var array
     */
    public array $categories = [];

    /**
     * @var Product[]
     */
    public array $products = [];

    /**
     * @var PopularCategory[]
     */
    public array $popularCategories = [];
    public function render() : View
    {
        $this->popularCategories = PopularCategory::all()->all();
        return view('livewire.search');
    }


    /**
     * @return void
     */
    public function activeMenu(): void
    {
         $this->isMenuActive = true;
    }

    public function updatedSearch(): void
    {

        $limit = 4;
        if($this->search !== ''){
            $this->products = Product::search($this->search)->take($limit)->get()->all();
            $this->categories[__('popular categories')] = PopularCategory::search($this->search)->take($limit)->get()->all();
            $this->categories[__('categories')] = ProductCategory::search($this->search)->take($limit)->get()->all();
            $this->categories[__('popular collections')] = ProductCollection::search($this->search)->take($limit)->get()->all();
        }else{
            $this->reset([ 'categories', 'products']);
        }
    }

    public function onSearch(): void
    {
        $this->redirectRoute('products.list', ['search' => $this->search]);
    }


    public function onSearchUpdate(): void
    {

    }

    /**
     * @return void
     */
    public function resetSearch(): void
    {
        $this->reset(['search', 'products','categories', 'isMenuActive']);
    }
}
