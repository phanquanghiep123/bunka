<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('status', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('module_id')->unsigned()->nullable()->index('FK_status_modules');
			$table->string('color', 191)->nullable();
			$table->string('bg', 191)->nullable();
			$table->string('class_name', 191)->nullable();
			$table->boolean('is_common')->nullable();
			$table->integer('sort')->nullable();
			$table->integer('level')->nullable()->default(1);
			$table->integer('not_select')->nullable()->default(0);
			$table->text('options', 65535)->nullable();
			$table->integer('status_id')->nullable()->default(1);
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
		Schema::drop('status');
	}

}
