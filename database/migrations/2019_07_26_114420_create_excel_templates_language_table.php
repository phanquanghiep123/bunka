<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExcelTemplatesLanguageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('excel_templates_language', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('lang_id')->unsigned()->index('FK_excel_templates_language_languages');
			$table->bigInteger('bind_key')->unsigned()->index('FK_excel_templates_language_excel_templates');
			$table->string('name')->nullable();
			$table->text('content', 65535)->nullable();
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
		Schema::drop('excel_templates_language');
	}

}
