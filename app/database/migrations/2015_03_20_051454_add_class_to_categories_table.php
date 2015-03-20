<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClassToCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('claimWorkCategory', function(Blueprint $table)
		{
			$table->string('class')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('claimWorkCategory', function(Blueprint $table)
		{
			$table->dropColumn('class');
		});
	}

}
