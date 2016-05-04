<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreteProjectNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_note', function (Blueprint $table) {
            $table->increments('id');
            $table->text('test');
            $table->integer('project_id');
            $table->foreign('project_id')->references('id')->on('projects');;
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
        Schema::drop('project_note');
    }
}
