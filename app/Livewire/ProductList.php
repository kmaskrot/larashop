<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCollection;
use App\Services\ProductService;
use Illuminate\View\View;
use Livewire\Component;

class ProductList extends Component
{


    /**
     * @var ProductCategory|null
     */
    public ProductCategory|null $category = null;

    /**
     * @var ProductCollection|null
     */
    public ProductCollection|null $collection = null;

    /**
     * @var Product[]
     */
    public array $products = [];

    /**
     * @var array
     */
    public array $filters = [];


    /**
     * @var array
     */
    public array $sports = [];

    /**
     * @var array
     */
    public array $apparel = [];


    /**
     * @var array
     */
    public array $genders = [];

    /**
     * @var array
     */
    public array $sizes = [];

    /**
     * @var string
     */
    public string $orderType = 'ASC';


    /**
     * @var string
     */
    public string $orderColumn = 'name';

    /**
     * @var string|null
     */
    public ?string $searchQuery = null;

    /**
     * @var int
     */
    public int $limit = 9;

    /**
     * @var int
     */
    public int $step = 3;
    /**
     * @var array|null
     */
    public ?array $defaultSizes = null;

    /**
     * @var bool
     */
    public bool $isMenuActive = true;

    /**
     * @var bool
     */
    public bool $continueScroll = true;

    public function render(): View
    {
        return view('livewire.product-list');
    }

    public function mount(): void
    {
        $this->search();
        $this->filters = ProductService::getFilters($this->category);
        $this->defaultSizes = ProductService::getSizes($this->category);

    }

    public function updatedApparel(): void
    {
        $this->search();
    }

    public function updatedSports(): void
    {
        $this->search();
    }

    public function updatedGenders(): void
    {
        $this->search();
    }

    public function updatedSizes(): void
    {
        $this->search();
    }


    public function updatedOrderType(): void
    {
        if ($this->orderType === 'price_asc') {
            $this->orderType = 'ASC';
            $this->orderColumn = 'price';
        }

        if ($this->orderType === 'price_desc') {
            $this->orderType = 'DESC';
            $this->orderColumn = 'price';
        }

        if ($this->orderType === 'news') {
            $this->orderType = 'DESC';
            $this->orderColumn = 'updated_at';
        }

        if ($this->orderType === 'popular') {
            $this->orderType = 'ASC';
            $this->orderColumn = 'name';
        }

        $this->search();
    }

    /**
     * @return void
     */
    private function search(): void
    {
        $products = ProductService::search(
            $this->searchQuery,
            $this->category,
            $this->collection,
            $this->genders,
            $this->apparel,
            $this->sports,
            $this->sizes,
            $this->orderType,
            $this->orderColumn,
            $this->limit
        );

        if (count($this->products) === count($products)) {
            $this->continueScroll = false;
        }
        $this->products = $products;


    }

    public function loadMore(): void
    {
        $this->limit += $this->step;
        $this->search();
    }

    public function toggleMenu(): void
    {
        $this->isMenuActive = !$this->isMenuActive;
    }
}
