<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;
use Livewire\Component;

class Cart extends Component
{
    /**
     * @var int
     */
    public int $nbItems = 0;

    #[Session]
    public array $cart = [];


    /**
     * @var string
     */
    private string $sessionCartKey = 'cart_items';


    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.number-shopping-cart-items');
    }

    /**
     * @param string $productUuid
     * @param int $quantity
     * @return void
     */
    #[On('product-added')]
    public function addToCart(string $productUuid, int $quantity): void
    {
        if (isset($this->cart[$productUuid])) {
            $this->cart[$productUuid] += $quantity;
            if ($this->cart[$productUuid] <= 0) {
                unset($this->cart[$productUuid]);
            }
        } else {
            $this->cart[$productUuid] = $quantity;
        }

        $this->dispatch('cart-updated', $this->cart);
    }

    /**
     * @return void
     */
    #[On('reset-cart')]

    public function resetCart(): void
    {

        $this->cart = [];
    }

    /**
     * @return void
     */
    #[On('refresh-cart')]

    public function refreshCart(): void
    {
        $this->dispatch('cart-updated', $this->cart);
    }


}
