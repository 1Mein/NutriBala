<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dish_products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('dish_id');
            $table->unsignedBigInteger('product_id');
            $table->float('amount')->nullable();
            $table->string('measure')->nullable();

            $table->timestamps();

            $table->index(['dish_id', 'product_id']);
            $table->unique(['dish_id', 'product_id']);

            $table->foreign('dish_id')->references('id')->on('dishes')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dish_products');
    }
};
