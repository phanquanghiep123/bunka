<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('branchs', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('name')->nullable();
			$table->string('short_name', 191)->nullable()->unique('short_name');
			$table->string('avatar')->nullable();
			$table->string('address')->nullable();
			$table->string('description', 500)->nullable();
			$table->timestamps();
			$table->bigInteger('status_id')->unsigned()->index('branchs_status_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('branchs');
	}

}
