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
        Schema::table('classes', function (Blueprint $table) {
            $table->string('Course');
            $table->string('Acdemic_period');
            $table->string('Meeting_per_week');
            $table->string('Population');
            $table->string('Unavailable_lecture_rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classes', function (Blueprint $table) {
        //     $table->dropColumn('Course');
        //     $table->dropColumn('Acdemic_period');
        //     $table->dropColumn('Meeting_per_week');
        //     $table->dropColumn('Population');
        //     $table->dropColumn('Unavailable_lecture_rooms');

            
        });
    }
};
