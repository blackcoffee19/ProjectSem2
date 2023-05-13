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
        Schema::create('order', function (Blueprint $table) {
            $table->id('id_order');
            $table->string('order_code');
            $table->foreignId('id_user')->nullable();
            $table->string('receiver');
            $table->string('phone');
            $table->string('address');
            $table->string('email');
            $table->string('code_coupon')->nullable();
            $table->bigInteger('shipping_fee')->default(24200);
            $table->enum('method',['cod','paypal']);
            $table->string('delivery_method');
            $table->enum('status',['finished','confirmed','delivery','unconfirmed','cancel','transaction failed']);
            $table->string('instruction')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
