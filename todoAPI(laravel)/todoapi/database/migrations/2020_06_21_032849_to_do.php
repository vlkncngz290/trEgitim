<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ToDo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Scheme::create(to_do,function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('creator_mail');
            $table->string('assigned_mail');
            $table->string('title');
            $table->string('content');
            $table->string('deadline');
            $table->string('status');
            $table->string('date_of_completion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
