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
            $table->bigInteger('seller_id')->nullable();
            $table->bigInteger('act_dealer_id')->nullable();
            $table->bigInteger('act_seller_id')->nullable();
            $table->string('name');
            $table->bigInteger('price');
            $table->bigInteger('bed')->nullable();
            $table->bigInteger('living_room')->nullable();
            $table->bigInteger('parking')->nullable();
            $table->bigInteger('kitchen')->nullable();
            $table->string('detail');
            $table->string('type')->nullable();
            $table->string('address');
            $table->string('location_city')->nullable();
            $table->string('bid_status')->nullable();
            $table->string('status')->default('For-Sale');
            $table->string('rating')->nullable();
            $table->string('hot_status')->default('no');
            $table->date('on_bid_date')->nullable();
            $table->date('close_bid_date')->nullable();
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
