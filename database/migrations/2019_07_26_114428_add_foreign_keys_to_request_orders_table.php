<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRequestOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('request_orders', function(Blueprint $table)
		{
			$table->foreign('order_id', 'FK_request_orders_orders')->references('id')->on('orders')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('status_change', 'FK_request_orders_status')->references('id')->on('status')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_id', 'FK_request_orders_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_old_id', 'FK_request_orders_users_2')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('request_orders', function(Blueprint $table)
		{
			$table->dropForeign('FK_request_orders_orders');
			$table->dropForeign('FK_request_orders_status');
			$table->dropForeign('FK_request_orders_users');
			$table->dropForeign('FK_request_orders_users_2');
		});
	}

}
