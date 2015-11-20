<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodeRevisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('node_revisions', function (Blueprint $table) {
            $table->increments('rid');
            $table->integer('nid')->unsigned();
            $table->string('title');
            $table->text('body');
            $table->integer('editor')->unsigned();
            $table->integer('published');
            $table->timestamps();
            $table->foreign('editor')
                ->references('uid')
                ->on('users');
            $table->foreign('nid')
                ->references('nid')
                ->on('nodes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('node_revisions');
    }
}
