<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductInventory;
use App\Models\ProductSize;
use Illuminate\View\View;
use Livewire\Component;

class AddProductToCart extends Component
{
    /**
     * @var Product
     */
    public Product $product;

    /**
     * @var ProductSize[]
     */
    public $sizes;

    /**
     * @var bool
     */
    public bool $buttonDisabled = true;


    /**
     * @var string|null
     */
    public ?string $alertMessage = null;

    /**
     * @var array
     */
    public array $availableSizes = [];


    /**
     * @var ProductInventory|null
     */
    public ?ProductInventory $selectedItem = null;

    /**
     * @var int
     */
    public int $quantity = 1;

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.add-product-to-cart');
    }

    /**
     * @return void
     */
    public function addToCart(): void
    {

        if ($this->selectedItem) {
            $quantityInCart = session('cart_items')[$this->selectedItem->uuid] ?? 0;

            if ($quantityInCart >= $this->selectedItem->stock) {
                $this->alertMessage = 'There is no more of this product left';
                $this->buttonDisabled = true;

            } else {
                $this->dispatch('product-added', $this->selectedItem->uuid, $this->quantity);
            }

        }else{
            $this->alertMessage = 'Please choose a size';
        }

    }

    public function selectSize(array $productSize): void
    {
        $this->selectedItem = ProductInventory::whereProductId($this->product->getKey())
            ->whereProductSizeId($productSize['id'])
            ->first();

        if ($this->selectedItem) {
            $this->buttonDisabled = false;
        }
    }
}
