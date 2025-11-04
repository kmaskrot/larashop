<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_colors', static function (Blueprint $table) {
            $table->id();
            $table->string('color_name');
            $table->string('hex');
            $table->timestamps();
        });

        Schema::table('products', static function (Blueprint $table) {
            $table->foreignId('product_color_id')->change()->constrained('product_colors'); // red, blue
        });
    }

    public function down(): void
    {
        Schema::table('products', static function (Blueprint $table) {
            $table->dropForeign(['product_color_id']);
        });
        Schema::dropIfExists('product_colors');
    }
};
