<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMstclassLanguageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mstclass_language', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->bigInteger('bind_key')->default(0);
			$table->bigInteger('lang_id')->default(0);
			$table->string('name', 500)->nullable();
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
		Schema::drop('mstclass_language');
	}

}
