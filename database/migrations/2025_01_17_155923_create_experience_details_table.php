<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienceDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('user_experience_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uid')->nullable();
            $table->json('organization')->nullable();
            $table->json('duration')->nullable();
            $table->json('duration_type')->nullable();
            $table->string('description')->nullable();
            $table->json('experience_certificate')->nullable();
            $table->timestamps();

            $table->foreign('uid')->references('id')->on('login_data')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_experience_details');
    }
}
