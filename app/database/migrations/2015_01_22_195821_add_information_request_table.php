<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInformationRequestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    /**
     * Information Request table.
     */
    Schema::create('informationRequest', function(Blueprint $table) {
      $table->increments('id');
      $table->string('title');
      $table->text('description');
      $table->integer('latitude');
      $table->integer('longitude');
      $table->string('photography');
      $table->integer('userId')->unsigned();
      $table->foreign('userId')->references('id')->on('users');
      $table->integer('neighborhoodId')->unsigned();
      $table->foreign('neighborhoodId')->references('id')->on('neighborhood');
      $table->integer('claimWorkCategoryId')->unsigned();
      $table->foreign('claimWorkCategoryId')->references('id')->on('claimWorkCategory');
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
    Schema::drop('informationRequest');
	}

}
