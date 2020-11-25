<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMstitemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mstitem', function(Blueprint $table)
		{
			$table->foreign('ItemClassId', 'mstitem_ibfk_1')->references('ItemClassId')->on('mstitemclass')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mstitem', function(Blueprint $table)
		{
			$table->dropForeign('mstitem_ibfk_1');
		});
	}

}
