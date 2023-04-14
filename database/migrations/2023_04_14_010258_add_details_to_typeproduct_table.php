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
        Schema::table('typeproduct', function (Blueprint $table) {
            $table->string('image')->nullable();
            $table->integer('status')->default(1)->comment('1=active, 0=disabled');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('typeproduct', function (Blueprint $table) {
            $table->string('status')->default('active');
        });
    }
};
