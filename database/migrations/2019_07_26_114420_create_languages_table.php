<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('languages', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->text('name', 65535);
			$table->string('slug', 191)->unique('slug');
			$table->string('icon', 500);
			$table->string('price_label', 500)->nullable();
			$table->string('price_facion', 500)->nullable();
			$table->boolean('is_default');
			$table->bigInteger('status_id')->unsigned()->nullable()->index('languages_status_id_foreign');
			$table->float('rate', 10, 0)->nullable();
			$table->timestamps();
			$table->string('locale')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('languages');
	}

}
