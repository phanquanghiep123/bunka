<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuotationOtherDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quotation_other_details', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('name', 500);
			$table->bigInteger('quotation_id')->unsigned()->index('FK_quotation_other_details_quotations');
			$table->float('saleprice', 10, 0);
			$table->float('price', 10, 0);
			$table->float('round_price', 10, 0);
			$table->float('total', 10, 0);
			$table->float('discount', 10, 0)->nullable();
			$table->float('discount1', 10, 0)->nullable();
			$table->float('discount2', 10, 0)->nullable();
			$table->integer('discount_active')->nullable();
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
		Schema::drop('quotation_other_details');
	}

}
