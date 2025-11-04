<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class UserAddressFactory extends Factory
{
    protected $model = UserAddress::class;

    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'user_id' => User::inRandomOrder()->value('id'),
            'is_default' => $this->faker->boolean(),
            'address' => $this->faker->address(),
            'complement' => $this->faker->address(),
            'city' => $this->faker->city(),
            'country' => $this->faker->country(),
            'zip_code' => $this->faker->postcode(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
