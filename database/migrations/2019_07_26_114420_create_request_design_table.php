<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRequestDesignTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('request_design', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('order_id')->unsigned()->index('request_design_order_id_foreign');
			$table->bigInteger('group_id')->unsigned()->index('request_design_group_id_foreign');
			$table->string('company', 191);
			$table->text('managers', 65535);
			$table->integer('expense')->unsigned()->default(0);
			$table->dateTime('date_send')->nullable();
			$table->text('files', 65535)->nullable();
			$table->text('requirements', 65535)->nullable();
			$table->bigInteger('status_id')->unsigned()->default(27)->index('request_design_status_id_foreign');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('request_design');
	}

}
