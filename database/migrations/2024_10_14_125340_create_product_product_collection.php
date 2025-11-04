<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_product_collection', static function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('product_collection_id')->constrained('product_collections')->onDelete('cascade');
            $table->timestamps();

            $table->primary(['product_id', 'product_collection_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_product_collection');
    }
};
