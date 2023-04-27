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
        Schema::create('product', function (Blueprint $table) {
            $table->id('id_product');
            $table->string('name');
            $table->foreignId('id_type');
            $table->boolean('status')->default(true);
            $table->bigInteger('quantity');
            $table->longText('description')->nullable();
            $table->bigInteger('original_price');
            $table->bigInteger('price');
            $table->double('sale')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
