<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuotationRateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quotation_rate', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('quotation_id')->unsigned()->nullable()->index('FK_quotation_rate_quotations');
			$table->bigInteger('rate_id')->nullable();
			$table->decimal('value', 10, 0)->nullable();
			$table->string('name', 200)->nullable();
			$table->string('format', 200)->nullable();
			$table->boolean('is_default')->nullable()->default(0);
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
		Schema::drop('quotation_rate');
	}

}
