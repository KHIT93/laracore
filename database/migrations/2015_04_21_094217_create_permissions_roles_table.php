<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permission_role', function(Blueprint $table)
		{
			$table->string('permission')->index();
                        $table->foreign('permission')->references('permission')->on('permissions')->onDelete('cascade');
                        $table->increments('rid')->unsigned()->index();
                        $table->foreign('rid')->references('rid')->on('roles')->onDelete('cascade');
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
            Schema::drop('permission_role');
	}

}
