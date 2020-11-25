<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchaseFeeOutsideTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchase_fee_outside', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->dateTime('date_of_recording')->nullable()->comment('Ngày tháng ghi sổ');
			$table->string('document_number')->nullable()->comment('Chứng từ - Số hiệu');
			$table->dateTime('document_date')->nullable()->comment('Chứng từ - Ngày tháng');
			$table->string('building_code')->nullable()->comment('Ngày tháng');
			$table->text('explains', 65535)->nullable()->comment('Diễn giải');
			$table->integer('reciprocal_account')->default(0)->comment('TK đối ứng');
			$table->decimal('number_of_debt_incurred', 10, 0)->default(0)->comment('Số phát sinh nợ');
			$table->decimal('the_number_arises_there', 10, 0)->default(0)->comment('Số phát sinh có');
			$table->decimal('outstanding_balance', 10, 0)->nullable()->default(0)->comment('Số dư nợ');
			$table->decimal('credit', 10, 0)->default(0)->comment('Số dư có');
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
		Schema::drop('purchase_fee_outside');
	}

}
