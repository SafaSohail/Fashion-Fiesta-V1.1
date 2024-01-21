<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('role')->nullable();
            $table->string('paymentType')->nullable();
            $table->string('paymentNumber')->nullable();
            $table->string('area')->nullable();
            $table->string('security_answer')->nullable();
            $table->string('security_question')->nullable();
            $table->string('cnic')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('password');
            $table->string('specialization')->nullable();
            $table->string('price')->nullable();
            $table->string('customPrice')->nullable();
            $table->string('avatar')->nullable();
            $table->string('pictures')->nullable();
            $table->string('message')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
