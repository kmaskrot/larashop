<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserOrder extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function shoppingCart() : BelongsTo
    {
        return $this->belongsTo(ShoppingCart::class);
    }

    /**
     * @return BelongsTo
     */
    public function userAddress() : BelongsTo
    {
        return $this->belongsTo(UserAddress::class);
    }

    /**
     * @return BelongsTo
     */
    public function userPayment() : BelongsTo
    {
        return $this->belongsTo(UserPayment::class);
    }

}
