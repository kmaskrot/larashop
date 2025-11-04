<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductInventory extends Model
{
    use HasFactory, HasUuid;


    protected static function boot(): void
    {
        parent::boot();
        static::bootHasUuid();
    }

    /**
     * @return BelongsTo
     */
    public function size() : BelongsTo
    {
        return $this->belongsTo(ProductSize::class, 'product_size_id');
    }

    /**
     * @return BelongsTo
     */
    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


    /**
     * @return BelongsTo
     */
    public function color() : BelongsTo
    {
        return $this->belongsTo(ProductColor::class, 'product_color_id');
    }

}
