<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExcelTemplatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('excel_templates', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('key', 50)->nullable()->unique('key');
			$table->bigInteger('status_id')->unsigned()->nullable()->index('FK_excel_templates_status');
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
		Schema::drop('excel_templates');
	}

}
