<?php

namespace App\Services;


use App\Models\ProductInventory;

class CartService
{

    /**
     * @param ProductInventory[] $productInventories
     * @return float
     */
    public static function getTotal(array $productInventories): float
    {
        $total = 0;

        if (!empty($productInventories)) {
            foreach ($productInventories as $productInventory) {
                $total += $productInventory->product->price * $productInventory->quantity;
            }
        }

        return $total;
    }

}