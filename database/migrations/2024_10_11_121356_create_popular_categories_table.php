<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('popular_categories', static function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('product_category_id')->constrained('product_categories')->onDelete('cascade');
            $table->integer('order');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('popular_categories');
    }
};
