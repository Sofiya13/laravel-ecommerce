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
        $table->string('product_name');
        $table->string('type');
        $table->decimal('price', 10, 2);
        $table->decimal('offer_price', 10, 2)->nullable();
        $table->text('description')->nullable();
        $table->json('images')->nullable(); // store multiple image paths as JSON
        $table->timestamps();
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
