<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_inventories', static function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('product_size_id')->constrained('product_sizes');
            $table->foreignId('product_id')->constrained('products');
            $table->integer('stock')->index();

            $table->unique(['product_id', 'product_size_id']);
            $table->timestamps();
            $table->index(['product_id']);
            $table->index(['product_size_id']);
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('product_inventories');

    }
};
