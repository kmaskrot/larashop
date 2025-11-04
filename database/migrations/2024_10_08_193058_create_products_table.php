<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', static function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->integer('product_filter_id');
            $table->integer('product_apparel_id');
            $table->integer('product_gender_id');
            $table->integer('product_color_id');
            $table->string('name');
            $table->string('slug');
            $table->string('image_path')->nullable();
            $table->decimal('price');
            $table->string('ref', 50)->index();
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();


            $table->index('product_filter_id');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
