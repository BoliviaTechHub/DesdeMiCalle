<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingForeingToItselfInClaimWorkCategory extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    // '¬'
//    Schema::table('claimWorkCategory', function($table) {
//      $table->foreign('parentId')->references('id')->on('claimWorkCategory');
//    });

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
