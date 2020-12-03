<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLanguageLabelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('language_labels', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('key_id', 191)->unique('key_id');
			$table->bigInteger('status_id')->unsigned()->nullable()->index('language_labels_status_id_foreign');
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
		Schema::drop('language_labels');
	}

}
