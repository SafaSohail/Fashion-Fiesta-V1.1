<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('cart')->nullable();
            $table->string('tailorId')->nullable();
            $table->string('userId')->nullable();
            $table->string('status')->nullable();
            $table->string('shippingaddress')->nullable();
            $table->string('shippingcity')->nullable();
            $table->string('shippingdistrict')->nullable();
            $table->string('shippingcontact')->nullable();
            $table->string('description')->nullable();
            $table->string('measurements')->nullable();
            $table->string('budget')->nullable();
            $table->string('fabric')->nullable();
            $table->string('image')->nullable();
            $table->string('amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
