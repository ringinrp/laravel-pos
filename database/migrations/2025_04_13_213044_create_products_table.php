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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnUpdate(); //nullOnDelete agar product tidak terhapus jika category dihapus
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('stock')->default(0);
            $table->integer('price')->default(0);
            $table->boolean('is_active')->default(true);
            $table->string('image')->nullable();
            $table->string('barcode')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
