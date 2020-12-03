<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToExcelTemplatesLanguageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('excel_templates_language', function(Blueprint $table)
		{
			$table->foreign('bind_key', 'FK_excel_templates_language_excel_templates')->references('id')->on('excel_templates')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('lang_id', 'FK_excel_templates_language_languages')->references('id')->on('languages')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('excel_templates_language', function(Blueprint $table)
		{
			$table->dropForeign('FK_excel_templates_language_excel_templates');
			$table->dropForeign('FK_excel_templates_language_languages');
		});
	}

}
