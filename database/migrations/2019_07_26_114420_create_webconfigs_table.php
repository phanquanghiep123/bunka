<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWebconfigsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('webconfigs', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('key', 191)->nullable()->unique('key');
			$table->text('value', 65535)->nullable();
			$table->text('content', 65535)->nullable();
			$table->boolean('type')->nullable();
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
		Schema::drop('webconfigs');
	}

}
