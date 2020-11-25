<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuotationDownloadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quotation_downloads', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('user_id')->unsigned()->nullable()->index('FK_quotation_downloads_users');
			$table->bigInteger('order_id')->unsigned()->nullable()->index('FK_quotation_downloads_orders');
			$table->bigInteger('product_id')->unsigned()->nullable();
			$table->bigInteger('quotation_id')->unsigned()->nullable()->index('FK_quotation_downloads_quotations');
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
		Schema::drop('quotation_downloads');
	}

}
