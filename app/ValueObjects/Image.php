<?php

namespace App\ValueObjects;

class Image
{
    public function __construct(
        private string  $path,
        private ?string $alt,
        private ?string $name
    )
    {
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getAlt(): ?string
    {
        return __($this->alt);
    }

    public function getName(): ?string
    {
        return __($this->alt);
    }
}