<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRequestQuotationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('request_quotations', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('user_id')->unsigned()->default(0)->index('FK_request_quotations_users');
			$table->bigInteger('user_old_id')->unsigned()->nullable()->index('FK_request_quotations_users_2');
			$table->bigInteger('quotation_id')->unsigned()->nullable()->default(0)->index('FK_request_quotations_quotations');
			$table->bigInteger('status_change')->unsigned()->nullable()->index('FK_request_quotations_status');
			$table->bigInteger('old_status')->unsigned()->nullable()->index('FK_request_quotations_status_2');
			$table->string('message', 1000)->nullable();
			$table->bigInteger('pid')->nullable();
			$table->string('path')->nullable();
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
		Schema::drop('request_quotations');
	}

}
