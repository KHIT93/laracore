<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetadatasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('metadatas', function(Blueprint $table)
		{
			$table->increments('nid');
                        $table->string('title');
                        $table->string('keywords');
                        $table->string('descriptions');
                        $table->string('robots');
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
		Schema::drop('metadatas');
	}

}
