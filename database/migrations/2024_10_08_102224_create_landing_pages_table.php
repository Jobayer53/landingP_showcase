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
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->id();
            $table->string('header')->nullable();
            $table->longText('short_description')->nullable();
            $table->string('quote_one')->nullable();
            $table->string('video')->nullable();
            $table->string('image')->nullable();
            $table->string('quote_two')->nullable();
            $table->string('benefit_title')->nullable();
            $table->string('uses_title')->nullable();
            $table->longText('uses')->nullable();
            $table->string('product_image')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_price')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_pages');
    }
};
