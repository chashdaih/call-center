<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCubiculeToCall extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('call', function (Blueprint $table) {
            $table->unsignedInteger('cubicule_id');
            $table->foreign('cubicule_id')->references('id')->on('cubicule');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('call', function (Blueprint $table) {
            $table->dropColumn('cubicule_id');
        });
    }
}
