<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_categories', static function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('type')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('image_path')->nullable();
            $table->string('alt')->nullable();
            $table->timestamps();

            $table->unique(['type', 'name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};
