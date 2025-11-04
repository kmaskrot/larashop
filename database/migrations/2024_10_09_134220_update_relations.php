<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('products', static function (Blueprint $table) {
            $table->foreignId('product_filter_id')->change()->constrained('product_categories');
            $table->foreignId('product_apparel_id')->change()->constrained('product_categories');
            $table->foreignId('product_gender_id')->change()->constrained('product_categories');
        });

    }

    public function down(): void
    {
        Schema::table('products', static function (Blueprint $table) {
            $table->dropForeign(['product_filter_id']);
            $table->dropForeign(['product_apparel_id']);
            $table->dropForeign(['product_gender_id']);
        });



    }
};
