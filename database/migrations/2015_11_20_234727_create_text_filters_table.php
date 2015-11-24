<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_filters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('internal_name')->unique();
            $table->string('name');
            $table->text('description');
            $table->string('type');
            $table->text('allowed_tags')->nullable();
            $table->integer('weight');
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
        Schema::drop('text_filters');
    }
}
