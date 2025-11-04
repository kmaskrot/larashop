<?php

namespace Database\Factories;

use App\Models\UserInvoice;
use App\Models\UserOrder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class UserOrderFactory extends Factory
{
    protected $model = UserOrder::class;

    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'shopping_cart_id' => $this->faker->randomNumber(),
            'user_id' => $this->faker->randomNumber(),
            'user_address_id' => $this->faker->address(),
            'user_payment_id' => $this->faker->randomNumber(),
            'shipping_status' => $this->faker->word(),
            'payment_status' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
