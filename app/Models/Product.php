<?php

namespace App\Models;

use App\Traits\HasImageUrlAttribute;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, SoftDeletes, Searchable, HasImageUrlAttribute;


    /**
     * @return HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }


    /**
     * @return HasMany
     */
    public function inventories(): HasMany
    {
        return $this->hasMany(ProductInventory::class, 'product_id');
    }

    /**
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }


    /**
     * @return BelongsTo
     */
    public function filter(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_filter_id');
    }

    /**
     * @return BelongsTo
     */
    public function color(): BelongsTo
    {
        return $this->belongsTo(ProductColor::class, 'product_color_id');
    }


    /**
     * @return BelongsTo
     */
    public function gender(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_gender_id');
    }

    /**
     * @return BelongsTo
     */
    public function apparel(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_apparel_id');
    }

    /**
     * @return BelongsToMany
     */
    public function collections(): BelongsToMany
    {
        return $this->belongsToMany(ProductCollection::class);
    }

    /**
     * @return BelongsToMany
     */
    public function sizes(): BelongsToMany
    {
        return $this->belongsToMany(ProductSize::class);
    }


    /**
     * @param Builder $query
     * @param string $relation
     * @param array|null $filters
     * @return void
     */
    public function scopeFilters(Builder $query, string $relation, ?array $filters): void
    {
        if ($filters) {
            $query->whereHas($relation, function ($query) use ($filters) {
                $query->whereIn('uuid', $filters);
            });
        }
    }

    /**
     * @return string
     */
    public function getLabelAttribute(): string
    {
        return __(':apparel for :gender', [
            'apparel' => $this->apparel->name,
            'gender' => $this->gender->name,
        ]);
    }

    /**
     * @return float
     */
    public function getRatingAttribute(): float
    {
        return number_format($this->reviews()->avg('rating'), 2);
    }
}
