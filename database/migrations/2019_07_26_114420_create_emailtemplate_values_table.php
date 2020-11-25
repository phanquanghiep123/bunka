<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmailtemplateValuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('emailtemplate_values', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('emailtemplate_id')->unsigned()->nullable();
			$table->bigInteger('lang_id')->unsigned()->nullable();
			$table->string('title');
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
		Schema::drop('emailtemplate_values');
	}

}
