<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStatusLanguageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('status_language', function(Blueprint $table)
		{
			$table->foreign('bind_key')->references('id')->on('status')->onUpdate('RESTRICT')->onDelete('CASCADE');
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
		Schema::table('status_language', function(Blueprint $table)
		{
			$table->dropForeign('status_language_bind_key_foreign');
			$table->dropForeign('status_language_lang_id_foreign');
		});
	}

}
