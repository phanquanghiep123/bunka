<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('code', 191);
			$table->string('authorized_name', 191)->nullable();
			$table->string('owner', 191)->nullable();
			$table->string('phone', 191)->nullable();
			$table->string('email', 191)->nullable();
			$table->string('construction_name', 191)->nullable();
			$table->string('construction_address', 191)->nullable();
			$table->string('construction_phone', 191)->nullable();
			$table->string('construction_fax', 191)->nullable();
			$table->string('construction_manager', 191)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->bigInteger('status_id')->unsigned()->nullable()->default(25)->index('FK_customers_status');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customers');
	}

}
