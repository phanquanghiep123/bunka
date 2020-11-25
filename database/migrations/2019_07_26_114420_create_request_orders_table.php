<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRequestOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('request_orders', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('user_id')->unsigned()->nullable()->index('FK_request_orders_users');
			$table->bigInteger('user_old_id')->unsigned()->nullable()->index('FK_request_orders_users_2');
			$table->bigInteger('order_id')->unsigned()->nullable()->index('FK_request_orders_orders');
			$table->bigInteger('status_change')->unsigned()->nullable()->index('FK_request_orders_status');
			$table->bigInteger('pid')->nullable()->default(0);
			$table->string('path', 500)->nullable();
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
		Schema::drop('request_orders');
	}

}
