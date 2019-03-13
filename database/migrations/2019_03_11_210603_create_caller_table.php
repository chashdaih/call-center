<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caller', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->unsignedTinyInteger('age');
            $table->string('phone_number');
            $table->string('other_phone_number')->nullable();
            $table->unsignedTinyInteger('state_id');
            $table->string('city');
            $table->unsignedInteger('file_number');
            $table->timestamps();

            $table->foreign('state_id')->references('id')->on('state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caller');
    }
}
