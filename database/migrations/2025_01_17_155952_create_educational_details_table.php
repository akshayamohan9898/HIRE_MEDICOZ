<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationalDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('user_educational_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uid')->nullable();
            $table->json('course')->nullable();
            $table->json('registration_number')->nullable();
            $table->json('specialization')->nullable();
            $table->json('college')->nullable();
            $table->json('passout_year')->nullable();
            $table->json('certificate')->nullable();
            $table->timestamps();

            $table->foreign('uid')->references('id')->on('login_data')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_educational_details');
    }
}
