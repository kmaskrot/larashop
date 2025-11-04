<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_orders', static function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('cart_id')->constrained('shopping_carts');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('user_address_id')->constrained('user_addresses');
            $table->foreignId('user_payment_id')->constrained('user_payments');
            $table->string('shipping_status');
            $table->string('payment_status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_orders');
    }
};
