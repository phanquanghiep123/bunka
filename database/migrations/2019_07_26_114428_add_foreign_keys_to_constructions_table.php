<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToConstructionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('constructions', function(Blueprint $table)
		{
			$table->foreign('status_id', 'FK_constructions_status')->references('id')->on('status')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('constructions', function(Blueprint $table)
		{
			$table->dropForeign('FK_constructions_status');
		});
	}

}
