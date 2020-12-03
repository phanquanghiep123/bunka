<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuotationDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quotation_details', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('quotation_id')->unsigned()->nullable()->index('FK_quotation_details_quotations');
			$table->bigInteger('product_id')->nullable();
			$table->string('code');
			$table->integer('quantity');
			$table->float('discount', 10, 0)->nullable();
			$table->float('discount1', 10, 0)->nullable();
			$table->float('discount2', 10, 0)->nullable();
			$table->integer('discount_active')->nullable();
			$table->float('installfee', 10, 0)->nullable();
			$table->float('inlandfreightfee', 10, 0)->nullable();
			$table->float('installationqsmini', 10, 0)->nullable();
			$table->float('productprice', 10, 0)->nullable();
			$table->float('price', 10, 0);
			$table->float('saleprice', 10, 0);
			$table->float('total', 10, 0);
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
		Schema::drop('quotation_details');
	}

}
