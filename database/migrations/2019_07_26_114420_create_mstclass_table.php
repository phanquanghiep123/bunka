<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMstclassTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mstclass', function(Blueprint $table)
		{
			$table->string('Class', 2);
			$table->string('ClassKey', 10);
			$table->string('ClassName', 100)->nullable();
			$table->string('ClassFullName', 100)->nullable();
			$table->string('Value1', 100)->nullable();
			$table->string('Value2', 100)->nullable();
			$table->string('Value3', 100)->nullable();
			$table->string('Value4', 100)->nullable();
			$table->string('Value5', 100)->nullable();
			$table->string('Value6', 100)->nullable();
			$table->string('Value7', 100)->nullable();
			$table->primary(['Class','ClassKey']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mstclass');
	}

}
