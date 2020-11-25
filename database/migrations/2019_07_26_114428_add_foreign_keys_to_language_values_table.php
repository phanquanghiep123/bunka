<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLanguageValuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('language_values', function(Blueprint $table)
		{
			$table->foreign('label_id')->references('id')->on('language_labels')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('lang_id')->references('id')->on('languages')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('language_values', function(Blueprint $table)
		{
			$table->dropForeign('language_values_label_id_foreign');
			$table->dropForeign('language_values_lang_id_foreign');
		});
	}

}
