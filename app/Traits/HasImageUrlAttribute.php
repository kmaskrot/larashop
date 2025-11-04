<?php

namespace App\Traits;


use Illuminate\Support\Facades\Vite;

trait HasImageUrlAttribute
{


    /**
     * Accessor for full image URL
     * @return string
     */
    public function getImageUrlAttribute() : string
    {
        return Vite::asset($this->image_path);
    }


}