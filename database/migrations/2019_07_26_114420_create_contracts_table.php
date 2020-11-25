<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contracts', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('curator')->nullable()->comment('Người phụ trách');
			$table->string('contract_number', 191)->comment('Số hợp đồng');
			$table->bigInteger('order_id')->unsigned()->index('contracts_order_id_foreign');
			$table->dateTime('bidding_date')->nullable()->comment('Ngày trúng thầu');
			$table->dateTime('date_signed')->nullable()->comment('Ngày nhận hợp đồng');
			$table->dateTime('date_on_the_contract')->nullable()->comment('Ngày trên hợp đồng');
			$table->dateTime('date_expired')->nullable()->comment('Ngày nghiệm thu');
			$table->float('price_is_not_vat', 10, 0)->nullable()->default(0)->comment('Giá trị Họp đồng chưa VAT');
			$table->float('value_has_vat', 10, 0)->nullable()->comment('Giá trị Hợp đồng có VAT');
			$table->string('guarantee')->nullable()->comment('Bảo lãnh');
			$table->dateTime('date_of_construction')->nullable()->comment('Ngày thi công trên HĐ');
			$table->dateTime('completion_date')->nullable()->comment('Ngày hoàn công trên HĐ');
			$table->bigInteger('status_id')->unsigned()->nullable()->index('contracts_status_id_foreign');
			$table->boolean('is_edit')->nullable()->default(0);
			$table->string('upload_orderpay', 500)->nullable();
			$table->string('upload_acceptance', 500)->nullable();
			$table->string('upload_subcontractors', 500)->nullable();
			$table->bigInteger('user_created')->unsigned()->nullable()->index('FK_contracts_users');
			$table->bigInteger('user_updated')->unsigned()->nullable()->index('FK_contracts_users_2');
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
		Schema::drop('contracts');
	}

}
