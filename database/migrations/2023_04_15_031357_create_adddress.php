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
        Schema::create('address', function (Blueprint $table) {
            $table->id('id_address');
            $table->foreignId('id_user');
            $table->string('receiver');
            $table->string('address')->nullable();
            $table->string('province');
            $table->string('district');
            $table->integer('district_id');
            $table->string('ward');
            $table->integer('ward_id');
            $table->string('phone');
            $table->string('email');
            $table->boolean('default')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adddress');
    }
};
