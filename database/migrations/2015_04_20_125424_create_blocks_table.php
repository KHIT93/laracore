<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlocksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->increments('bid');
            $table->string('module')->default('block');
            $table->string('delta');
            $table->string('theme');
            $table->integer('position');
            $table->string('section');
            $table->integer('visibility')->unsigned();
            $table->text('pages');
            $table->string('title');
            $table->string('description')->nullable();
            $table->text('body')->nullable();
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
        Schema::drop('blocks');
    }

}
