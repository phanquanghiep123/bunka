<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchaseFeeOutsideNewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchase_fee_outside_new', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->integer('number')->default(0);
			$table->string('building_code')->comment('Mã công trình - Số quản lý');
			$table->integer('back_order')->nullable()->default(0)->comment('Đặt hàng trở lại');
			$table->integer('sales')->default(0)->comment('Bán hàng');
			$table->dateTime('document_date')->comment('Chứng từ - Ngày tháng');
			$table->string('document_number')->nullable()->comment('Chứng từ - Số hiệu');
			$table->text('explains', 65535)->nullable()->comment('Diễn giải');
			$table->integer('reciprocal_account')->comment('TK đối ứng');
			$table->decimal('debt_side', 10, 0)->comment('Bên Nợ');
			$table->decimal('have_side', 10, 0)->comment('Bên Có');
			$table->decimal('total', 10, 0)->comment('Tổng');
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
		Schema::drop('purchase_fee_outside_new');
	}

}
