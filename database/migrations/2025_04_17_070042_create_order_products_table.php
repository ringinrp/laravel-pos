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
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete()->cascadeOnUpdate(); //cascadeOnDelete agar order_product terhapus jika order dihapus
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete()->cascadeOnUpdate(); //cascadeOnDelete agar order_product terhapus jika product dihapus
            $table->integer('quantity');
            $table->integer('unit_price');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
