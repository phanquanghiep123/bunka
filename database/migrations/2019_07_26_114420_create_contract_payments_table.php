<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractPaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contract_payments', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('contract_id')->unsigned()->index('contract_payments_contract_id_foreign');
			$table->bigInteger('periods_id');
			$table->string('from', 191);
			$table->string('to', 191);
			$table->string('date', 191);
			$table->integer('payment_amount')->unsigned();
			$table->text('receipts', 65535);
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
		Schema::drop('contract_payments');
	}

}
