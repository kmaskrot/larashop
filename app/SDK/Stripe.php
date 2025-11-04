<?php

namespace App\SDK;

use AllowDynamicProperties;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

#[AllowDynamicProperties] class Stripe
{
    public function __construct()
    {
        $this->url = config('stripe.url');
        $this->secret_key = config('stripe.secret_key');
        $this->public_key = config('stripe.public_key');
    }



}