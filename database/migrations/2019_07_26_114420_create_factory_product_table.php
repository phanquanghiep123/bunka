<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFactoryProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('factory_product', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('code_works')->nullable()->comment('Mã công trình');
			$table->string('ss_no')->nullable()->comment('SS No');
			$table->string('received_date')->nullable()->comment('Ngày nhận');
			$table->integer('type')->nullable()->comment('Loại');
			$table->string('FactoryCode', 10)->nullable();
			$table->integer('w')->default(0)->comment('Rộng');
			$table->integer('h')->default(0)->comment('Cao');
			$table->decimal('m2', 11, 0)->default(0)->comment('Met vuông');
			$table->integer('position')->default(0)->comment('Vị trí');
			$table->string('produce_code')->nullable()->comment('Mã sản xuất');
			$table->dateTime('registration_date_of_separation')->nullable()->comment('Ngày đăng ký bốc tách');
			$table->dateTime('date_registration')->nullable()->comment('Ngày đăng ký sản xuất');
			$table->dateTime('date_registration_complete')->nullable()->comment('Ngày đăng ký hoàn thành');
			$table->dateTime('date_complete')->nullable()->comment('Ngày hoàn thành');
			$table->dateTime('date_registration_export')->nullable()->comment('Ngày đăng ký xuất');
			$table->dateTime('date_export')->nullable()->comment('Ngày xuất');
			$table->string('complete')->nullable()->comment('Hoàn thành');
			$table->text('comment', 65535)->nullable()->comment('Ghi chú bộ cửa đặc biệt');
			$table->string('xb1')->nullable()->comment('XB 1.0');
			$table->decimal('price_of_sales_department', 10, 0)->default(0)->comment('Giá của phòng kinh doanh');
			$table->decimal('price_factory', 10, 0)->default(0)->comment('Giá của nhà máy');
			$table->decimal('price_real', 10, 0)->default(0)->comment('Giá sản xuất thực tế');
			$table->decimal('price_no_sale', 10, 0)->default(0)->comment('Giá chưa giảm giá');
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
		Schema::drop('factory_product');
	}

}
