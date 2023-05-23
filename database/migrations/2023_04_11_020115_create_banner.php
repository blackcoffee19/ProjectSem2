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
        Schema::create('banner', function (Blueprint $table) {
            $table->id('id_banner');
            $table->string('image');
            $table->enum('status', [0, 1])->default(0)->comment('0: disabled, 1: enabled');
            $table->enum('type', [1, 2])->default(1)->comment('1: horizontal, 2: vertical');
            $table->string('title', 500);
            $table->string('title_color', 7)->default('#000000');
            $table->string('content')->nullable();
            $table->string('content_color', 7)->default('#838E94');
            $table->string('btn_content', 20)->nullable();
            $table->string('btn_bg_color', 7)->default('#000000');
            $table->string('btn_color', 7)->default('#ffffff');
            $table->string('link', 40)->nullable();
            $table->string('attr', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner');
    }
};
