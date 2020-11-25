<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMstitempriceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mstitemprice', function(Blueprint $table)
		{
			$table->string('GroupClassKey', 10);
			$table->integer('ItemId')->index('ItemId');
			$table->float('UnitPrice', 10, 0);
			$table->float('UnitPriceOther', 10, 0)->nullable();
			$table->timestamp('ValidFrom')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('ValidTo')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mstitemprice');
	}

}
