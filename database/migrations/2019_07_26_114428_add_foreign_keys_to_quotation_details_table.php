<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToQuotationDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('quotation_details', function(Blueprint $table)
		{
			$table->foreign('quotation_id', 'FK_quotation_details_quotations')->references('id')->on('quotations')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('quotation_details', function(Blueprint $table)
		{
			$table->dropForeign('FK_quotation_details_quotations');
		});
	}

}
