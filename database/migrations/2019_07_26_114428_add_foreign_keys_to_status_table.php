<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('status', function(Blueprint $table)
		{
			$table->foreign('module_id', 'FK_status_modules')->references('id')->on('modules')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('status', function(Blueprint $table)
		{
			$table->dropForeign('FK_status_modules');
		});
	}

}
