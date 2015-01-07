<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FirstSchemaDesign extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    /**
     * ClaimWorkCategory table.
     */
    Schema::create('claimWorkCategory', function(Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->integer('parentId');
      $table->integer('status');
      $table->timestamps();
    });

    /**
     * Neighborhood table.
     */
    Schema::create('neighborhood', function(Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->text('description');
      $table->integer('latitude');
      $table->integer('longitude');
      $table->timestamps();
    });

    /**
     * Claim table.
     */
    Schema::create('claim', function(Blueprint $table) {
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

    /**
     * PublicWorkStatus table.
     */
    Schema::create('publicWorkStatus', function(Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->timestamps();
    });

    /**
     * PublicWork table.
     */
    Schema::create('publicWork', function(Blueprint $table) {
      $table->increments('id');
      $table->string('title');
      $table->text('description');
      $table->integer('latitude');
      $table->integer('longitude');
      $table->string('photography');
      $table->string('source');
      $table->string('responsibleOrgan');
      $table->string('executingOrgan');
      $table->string('budget');
      $table->string('year');
      $table->integer('userId')->unsigned();
      $table->foreign('userId')->references('id')->on('users');
      $table->integer('neighborhoodId')->unsigned();
      $table->foreign('neighborhoodId')->references('id')->on('neighborhood');
      $table->integer('claimWorkCategoryId')->unsigned();
      $table->foreign('claimWorkCategoryId')->references('id')->on('claimWorkCategory');
      $table->integer('publicWorkStatusId')->unsigned();
      $table->foreign('publicWorkStatusId')->references('id')->on('publicWorkStatus');
      $table->timestamps();
    });

    /**
     * SupportToClaim table.
     */
    Schema::create('supportToClaim', function(Blueprint $table) {
      $table->increments('id');
      $table->integer('userId')->unsigned();
      $table->foreign('userId')->references('id')->on('users');
      $table->integer('claimId')->unsigned();
      $table->foreign('claimId')->references('id')->on('claim');
      $table->timestamps();
    });

    /**
     * Comments table.
     */
    Schema::create('comments', function(Blueprint $table) {
      $table->increments('id');
      $table->text('description');
      $table->integer('status');
      $table->integer('userId')->unsigned();
      $table->foreign('userId')->references('id')->on('users');
      $table->timestamps();
    });

    /**
     * CommentsResource table.
     */
    Schema::create('commentsResource', function(Blueprint $table) {
      $table->increments('id');
      $table->integer('commentId')->unsigned();
      $table->foreign('commentId')->references('id')->on('comments');
      $table->integer('resourceId')->unsigned();
      $table->string('resourceType');
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
    Schema::drop('commentsResource');
    Schema::drop('comments');
    Schema::drop('supportToClaim');
    Schema::drop('publicWork');
    Schema::drop('publicWorkStatus');
    Schema::drop('claim');
    Schema::drop('neighborhood');
    Schema::drop('claimWorkCategory');
	}

}
