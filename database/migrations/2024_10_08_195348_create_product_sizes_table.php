<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_sizes', static function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->float('order');
            $table->string('size');
            $table->string('type');
            $table->timestamps();

            $table->unique(['size']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_sizes');
    }
};
