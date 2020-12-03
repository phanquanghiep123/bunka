<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMenusLanguageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('menus_language', function(Blueprint $table)
		{
			$table->foreign('lang_id', 'FK_menus_language_languages')->references('id')->on('languages')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('bind_key', 'FK_menus_language_menus')->references('id')->on('menus')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('menus_language', function(Blueprint $table)
		{
			$table->dropForeign('FK_menus_language_languages');
			$table->dropForeign('FK_menus_language_menus');
		});
	}

}
