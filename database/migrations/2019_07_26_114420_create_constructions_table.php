<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConstructionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('constructions', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('code', 100);
			$table->string('code_system', 100);
			$table->string('name');
			$table->string('address')->nullable();
			$table->string('phone')->nullable();
			$table->string('fax')->nullable();
			$table->string('manager')->nullable();
			$table->bigInteger('status_id')->unsigned()->index('FK_constructions_status');
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
		Schema::drop('constructions');
	}

}
