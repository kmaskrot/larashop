<?php

namespace App\Models;

use App\Traits\HasImageUrlAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Laravel\Scout\Searchable;

class ProductCategory extends Model
{
    use HasFactory, Searchable, HasImageUrlAttribute;

    /**
     * @return MorphTo
     */
    public function related(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return string
     */
    public function getTitleAttribute(): string
    {
        if($this->type === 'filter' || $this->name === 'kids' ||$this->type === 'gender'){
            return __('clothes for :title', [
                'title' => $this->name
            ]);
        }

        if($this->type === 'apparel'){
            return __($this->name);
        }

        return '';
    }
}
