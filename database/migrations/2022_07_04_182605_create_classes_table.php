<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('Course');
            $table->string('Acdemic_period');
            $table->string('Meeting_per_week');
            $table->string('Population');
            $table->string('Unavailable_lecture_rooms');
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
        Schema::create('classes', function (Blueprint $table) {
            Schema::dropIfExists(('classes'));

            
        });
    }
};
