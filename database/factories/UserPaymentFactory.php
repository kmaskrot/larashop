<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserPayment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class UserPaymentFactory extends Factory
{
    protected $model = UserPayment::class;

    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'user_id' => User::inRandomOrder()->value('id'),
            'name' => $this->faker->name(),
            'type' => $this->faker->creditCardType(),
            'provider' => $this->faker->creditCardType(),
            'number' => $this->faker->numberBetween(1000, 9999),
            'expiration_date' => $this->faker->creditCardExpirationDateString(),
            'is_default' => $this->faker->boolean(),
            'status' => $this->faker->currencyCode(),
            'token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
