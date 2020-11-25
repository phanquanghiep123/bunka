<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToQuotationDownloadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('quotation_downloads', function(Blueprint $table)
		{
			$table->foreign('order_id', 'FK_quotation_downloads_orders')->references('id')->on('orders')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('quotation_id', 'FK_quotation_downloads_quotations')->references('id')->on('quotations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_id', 'FK_quotation_downloads_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('quotation_downloads', function(Blueprint $table)
		{
			$table->dropForeign('FK_quotation_downloads_orders');
			$table->dropForeign('FK_quotation_downloads_quotations');
			$table->dropForeign('FK_quotation_downloads_users');
		});
	}

}
