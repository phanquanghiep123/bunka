<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuotationMergesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quotation_merges', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('quotation_id')->nullable();
			$table->text('folder1')->nullable();
			$table->text('folder2')->nullable();
			$table->bigInteger('user_id')->nullable();
			$table->string('key_id')->nullable();
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
		Schema::drop('quotation_merges');
	}

}
