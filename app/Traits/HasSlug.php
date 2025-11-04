<?php

namespace App\Traits;


use App\Models\User;
use Illuminate\Support\Str;

trait HasSlug
{

    /**
     * @return void
     */
    protected static function bootHasSlug(): void
    {
        static::saving(static function ($model) {
            if (empty($model->slug)) {
                if ($model instanceof User) {
                    $model->slug = Str::slug($model->firstname . ' ' . $model->lastname);
                } else {
                    $model->slug = Str::slug($model->name);
                }
            }

        });
    }


    /**
     * @return $this
     */
    public function configure(): static
    {
        return $this->afterMaking(function ($productGroup) {
            $productGroup->slug = \Str::slug($productGroup->name);
        });
    }

}