<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMstitemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mstitem', function(Blueprint $table)
		{
			$table->integer('ItemId', true);
			$table->string('ItemName', 200);
			$table->integer('ItemClassId')->index('ItemClassId');
			$table->string('PricePatternKey', 50)->nullable();
			$table->string('ItemNameVN', 200)->nullable();
			$table->string('ItemNameJP', 200)->nullable();
			$table->string('FactoryCode', 10)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mstitem');
	}

}
