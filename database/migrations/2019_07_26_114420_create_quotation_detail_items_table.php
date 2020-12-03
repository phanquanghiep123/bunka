<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuotationDetailItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quotation_detail_items', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('detail_id')->unsigned()->nullable()->index('FK_quotation_detail_items_quotation_details');
			$table->bigInteger('item_id')->nullable();
			$table->float('price', 10, 0)->nullable();
			$table->float('saleprice', 10, 0)->nullable();
			$table->float('not_round_price', 10, 0)->nullable();
			$table->float('not_round_saleprice', 10, 0)->nullable();
			$table->float('width', 10, 0)->nullable();
			$table->float('height', 10, 0)->nullable();
			$table->integer('quantity')->nullable();
			$table->boolean('is_inlandfreightfee')->nullable()->default(0);
			$table->boolean('is_installfee')->nullable()->default(0);
			$table->boolean('is_installationqs')->nullable()->default(0);
			$table->boolean('is_product')->nullable()->default(0);
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
		Schema::drop('quotation_detail_items');
	}

}
