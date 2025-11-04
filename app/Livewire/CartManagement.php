<?php

namespace App\Livewire;

use App\Models\ProductInventory;
use App\Services\CartService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class CartManagement extends Component
{
    /**
     * @var ProductInventory[]
     */
    public array $productInventories = [];

    public array $cart = [];
    /**
     * @var float|int
     */
    public float|int $total = 0;

    /**
     * @return View
     */
    public function render(): View
    {
        if(count($this->cart) <= 0){
            $this->dispatch('refresh-cart');

        }

        $this->updateProductInventories();
        $this->getTotal();

        return view('livewire.cart-management');
    }

    /**
     * @param array $product
     * @param int $quantity
     * @return void
     */
    public function addToCart(array $product, int $quantity = 1): void
    {
        $this->dispatch('product-added', $product['uuid'], $quantity);
        $this->getTotal();
        $this->updateProductInventories();
    }

    /**
     * @return void
     */
    private function getTotal(): void
    {
        $this->total = CartService::getTotal($this->productInventories);
    }

    /**
     * @return void
     */
    private function updateProductInventories(): void
    {
        $arrayUuid = array_keys($this->cart ?? []);

        $productInventories = ProductInventory::whereIn('uuid', $arrayUuid)->get();

        $productInventories->map(function (ProductInventory $productInventory) {
            $productInventory->quantity = $this->cart[$productInventory->uuid];
        });
        $this->productInventories = $productInventories->all();
    }

    /**
     * @return void
     */
    public function resetCurrentCart(): void
    {
        $this->dispatch('reset-cart');
    }

    #[On('cart-updated')]
    public function resetCartItems($cart): void
    {
        $this->cart = $cart;
    }

    public function validCart(): void
    {
        if(!empty($this->productInventories)){
            if(!Auth::user()){
                $this->redirectRoute('auth.lookup');
            }else{
                CartService::save($this->productInventories, Auth::user());
                $this->redirectRoute();
            }

        }
    }
}
