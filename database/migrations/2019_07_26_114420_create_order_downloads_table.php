<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderDownloadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_downloads', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('order_id')->unsigned()->nullable()->index('FK_order_downloads_orders');
			$table->bigInteger('user_id')->unsigned()->nullable()->index('FK_order_downloads_users');
			$table->timestamps();
			$table->integer('type')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_downloads');
	}

}
