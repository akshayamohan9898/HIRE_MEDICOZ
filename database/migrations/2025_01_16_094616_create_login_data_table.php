<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginDataTable extends Migration
{
    public function up()
    {
        Schema::create('login_data', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('user_type');
            $table->string('login_status');
            $table->string('phone_otp');
            $table->string('email_otp');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('login_data');
    }
}
