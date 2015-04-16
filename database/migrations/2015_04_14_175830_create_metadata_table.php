<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetadataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('metadata', function(Blueprint $table)
		{
			$table->integer('nid');
                        $table->string('title');
                        $table->string('keywords');
                        $table->string('description');
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
		Schema::drop('metadata');
	}

}
