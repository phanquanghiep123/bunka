<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOtherProductDownloadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('other_product_downloads', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('order_id')->unsigned()->nullable()->index('FK_other_product_downloads_orders');
			$table->bigInteger('user_id')->unsigned()->nullable()->index('FK_other_product_downloads_users');
			$table->boolean('type')->nullable();
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
		Schema::drop('other_product_downloads');
	}

}
