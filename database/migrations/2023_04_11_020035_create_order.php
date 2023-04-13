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
            $table->string('order_name');
            $table->string('order_address');
            $table->string('order_phone');
            $table->string('order_email');
            $table->string('code_coupon')->nullable();
            $table->decimal('shipping_fee',8,1)->default(2);
            $table->enum('method',['online','cod']);
            $table->string('image')->nullable();
            $table->enum('status',['finished','confirmed','delivery','unconfimred','cancel','transaction failed']);
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
