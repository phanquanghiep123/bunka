<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMstitemlimitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mstitemlimit', function(Blueprint $table)
		{
			$table->integer('Id', true);
			$table->integer('ParentItemId');
			$table->string('MatrixValue', 100);
			$table->integer('ItemClassId')->index('ItemClassId');
			$table->integer('ItemId');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mstitemlimit');
	}

}
