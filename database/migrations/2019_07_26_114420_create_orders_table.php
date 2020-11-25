<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('order_number', 191)->unique('order_number');
			$table->bigInteger('order_no_id')->nullable()->index('FK_orders_order_nos');
			$table->bigInteger('quotation_id')->unsigned()->nullable()->index('FK_orders_quotations');
			$table->bigInteger('status_id')->unsigned()->nullable()->index('FK_orders_status');
			$table->bigInteger('person_in_charge')->nullable();
			$table->date('receiving_order_date')->nullable();
			$table->date('planned_delivery_date')->nullable();
			$table->date('planned_installation_date')->nullable();
			$table->date('planned_completion_date')->nullable();
			$table->float('discount', 10, 0)->nullable();
			$table->float('sub_total', 10, 0)->nullable();
			$table->float('grand_sub_total', 10, 0)->nullable();
			$table->float('tax_price', 10, 0)->nullable();
			$table->float('product_price', 10, 0)->nullable();
			$table->float('other_price', 10, 0)->nullable();
			$table->float('total', 10, 0)->nullable();
			$table->bigInteger('user_created')->unsigned()->nullable()->index('FK_orders_users');
			$table->bigInteger('user_updated')->unsigned()->nullable()->index('FK_orders_users_2');
			$table->integer('is_edit')->default(0);
			$table->boolean('not_sent_notifition')->default(0);
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
		Schema::drop('orders');
	}

}
