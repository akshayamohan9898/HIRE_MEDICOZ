<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('user_personal_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uid')->nullable();
            $table->string('name')->nullable();
            $table->string('phonenumber')->unique();
            $table->string('field_of_profession')->nullable();
            $table->string('type_of_duty')->nullable();
            $table->string('additional_contact_no')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('permanent_state')->nullable();
            $table->string('permanent_district')->nullable();
            $table->string('permanent_city')->nullable();
            $table->string('permanent_pincode')->nullable();
            $table->string('current_address')->nullable();
            $table->string('current_state')->nullable();
            $table->string('current_district')->nullable();
            $table->string('current_city')->nullable();
            $table->string('current_pincode')->nullable();
            $table->string('employee_id')->nullable();
            $table->timestamps();

            $table->foreign('uid')->references('id')->on('login_data')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_personal_details');
    }
}
