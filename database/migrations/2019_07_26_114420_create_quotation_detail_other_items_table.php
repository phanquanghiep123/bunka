<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuotationDetailOtherItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quotation_detail_other_items', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('detail_id')->unsigned()->index('FK_quotation_detail_other_items_quotation_details');
			$table->string('name', 500)->nullable();
			$table->float('width', 10, 0)->nullable();
			$table->float('height', 10, 0)->nullable();
			$table->string('remarks', 500)->nullable();
			$table->integer('quantity')->nullable();
			$table->float('saleprice', 10, 0)->nullable();
			$table->float('price', 10, 0)->nullable();
			$table->integer('type')->nullable()->default(1);
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
		Schema::drop('quotation_detail_other_items');
	}

}
