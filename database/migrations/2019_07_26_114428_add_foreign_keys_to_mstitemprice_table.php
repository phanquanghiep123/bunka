<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMstitempriceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mstitemprice', function(Blueprint $table)
		{
			$table->foreign('ItemId', 'mstitemprice_ibfk_1')->references('ItemId')->on('mstitem')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mstitemprice', function(Blueprint $table)
		{
			$table->dropForeign('mstitemprice_ibfk_1');
		});
	}

}
