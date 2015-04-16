<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nodes', function(Blueprint $table)
		{
			$table->increments('nid');
                        $table->string('title');
                        $table->text('body');
                        $table->integer('author')->unsigned();
                        $table->integer('published');
			$table->timestamps();
                        $table->foreign('author')
                                ->references('uid')
                                ->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nodes');
	}

}
