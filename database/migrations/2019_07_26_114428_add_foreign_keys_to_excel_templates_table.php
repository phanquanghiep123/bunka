<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToExcelTemplatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('excel_templates', function(Blueprint $table)
		{
			$table->foreign('status_id', 'FK_excel_templates_status')->references('id')->on('status')->onUpdate('SET NULL')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('excel_templates', function(Blueprint $table)
		{
			$table->dropForeign('FK_excel_templates_status');
		});
	}

}
