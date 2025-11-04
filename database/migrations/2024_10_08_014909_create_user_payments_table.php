<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_payments', static function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name'); //the name of the owner
            $table->string('type'); //credit card or PayPal
            $table->string('provider'); //visa or Mastercard
            $table->integer('number');
            $table->string('expiration_date');
            $table->boolean('is_default');
            $table->string('status');
            $table->string('token')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement("ALTER TABLE user_payments ADD CONSTRAINT number_length CHECK (number >= 1000 AND number <= 9999)");
    }

    public function down(): void
    {
        Schema::dropIfExists('user_payments');
    }
};
