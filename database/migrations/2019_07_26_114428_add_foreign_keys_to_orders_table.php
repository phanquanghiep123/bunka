<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('orders', function(Blueprint $table)
		{
			$table->foreign('order_no_id', 'FK_orders_order_nos')->references('id')->on('order_nos')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('quotation_id', 'FK_orders_quotations')->references('id')->on('quotations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('status_id', 'FK_orders_status')->references('id')->on('status')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_created', 'FK_orders_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_updated', 'FK_orders_users_2')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('orders', function(Blueprint $table)
		{
			$table->dropForeign('FK_orders_order_nos');
			$table->dropForeign('FK_orders_quotations');
			$table->dropForeign('FK_orders_status');
			$table->dropForeign('FK_orders_users');
			$table->dropForeign('FK_orders_users_2');
		});
	}

}
