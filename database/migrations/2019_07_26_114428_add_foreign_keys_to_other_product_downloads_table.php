<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOtherProductDownloadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('other_product_downloads', function(Blueprint $table)
		{
			$table->foreign('order_id', 'FK_other_product_downloads_orders')->references('id')->on('orders')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_id', 'FK_other_product_downloads_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('other_product_downloads', function(Blueprint $table)
		{
			$table->dropForeign('FK_other_product_downloads_orders');
			$table->dropForeign('FK_other_product_downloads_users');
		});
	}

}
