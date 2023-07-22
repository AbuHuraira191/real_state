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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dealer_id')->nullable();
            $table->bigInteger('seller_id')->nullable();
            $table->string('name');
            $table->bigInteger('price');
            $table->bigInteger('bed')->nullable();
            $table->bigInteger('living_room')->nullable();
            $table->bigInteger('parking')->nullable();
            $table->bigInteger('kitchen')->nullable();
            $table->string('detail');
            $table->string('type')->nullable();
            $table->string('address');
            $table->string('location')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('bid_status')->nullable();
            $table->string('action')->nullable();
            $table->string('rating')->nullable();
            $table->string('hot_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
