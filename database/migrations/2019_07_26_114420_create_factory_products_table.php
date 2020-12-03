<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFactoryProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('factory_products', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->dateTime('received_date')->nullable();
			$table->string('construction_code', 500);
			$table->string('discount', 500);
			$table->string('product_no', 500);
			$table->string('construction_name', 500);
			$table->string('product_type', 500);
			$table->string('produce_code', 500);
			$table->float('width', 10, 0);
			$table->float('height', 10, 0);
			$table->float('quantily', 10, 0);
			$table->float('position', 10, 0);
			$table->float('acreage', 10, 0);
			$table->dateTime('dissection_registration_date');
			$table->dateTime('produce_registration_date');
			$table->dateTime('success_registration_date');
			$table->dateTime('success_date');
			$table->dateTime('export_registration_date');
			$table->dateTime('export_date');
			$table->string('note_special', 1000);
			$table->string('note', 1000);
			$table->float('factory_price', 10, 0);
			$table->float('reality_price', 10, 0);
			$table->integer('price_of_department');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('factory_products');
	}

}
