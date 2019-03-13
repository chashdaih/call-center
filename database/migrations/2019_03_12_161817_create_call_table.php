<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('office_id');
            $table->unsignedInteger('cubicule_id');
            $table->unsignedSmallInteger('schedule_id');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('caller_id');
            $table->unsignedSmallInteger('reason_id');
            $table->boolean('called');
            $table->text('observation');
            $table->timestamps();

            $table->foreign('cubicule_id')->references('id')->on('cubicule');
            $table->foreign('schedule_id')->references('id')->on('schedule');
            $table->foreign('student_id')->references('id')->on('student');
            $table->foreign('caller_id')->references('id')->on('caller');
            $table->foreign('office_id')->references('id')->on('office');
            $table->foreign('reason_id')->references('id')->on('reason');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('call');
    }
}
