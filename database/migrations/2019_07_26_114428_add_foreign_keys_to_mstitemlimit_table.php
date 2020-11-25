<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMstitemlimitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mstitemlimit', function(Blueprint $table)
		{
			$table->foreign('ItemClassId', 'mstitemlimit_ibfk_1')->references('ItemClassId')->on('mstitemclass')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mstitemlimit', function(Blueprint $table)
		{
			$table->dropForeign('mstitemlimit_ibfk_1');
		});
	}

}
