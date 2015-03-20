<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteLatitudeAndLongitudeColumns extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('claim', function(Blueprint $table)
		{
            $table->dropColumn('latitude');
            $table->dropColumn('longitude');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('claim', function(Blueprint $table)
		{
		});
	}

}
