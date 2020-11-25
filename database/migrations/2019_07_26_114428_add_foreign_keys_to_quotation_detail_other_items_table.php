<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToQuotationDetailOtherItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('quotation_detail_other_items', function(Blueprint $table)
		{
			$table->foreign('detail_id', 'FK_quotation_detail_other_items_quotation_details')->references('id')->on('quotation_details')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('quotation_detail_other_items', function(Blueprint $table)
		{
			$table->dropForeign('FK_quotation_detail_other_items_quotation_details');
		});
	}

}
