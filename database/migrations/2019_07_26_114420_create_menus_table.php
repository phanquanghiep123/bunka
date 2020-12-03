<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menus', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('pid')->default(0);
			$table->string('path', 500)->nullable();
			$table->string('class_name', 500)->nullable();
			$table->string('path_id', 500)->nullable();
			$table->string('icon', 100)->nullable();
			$table->integer('sort');
			$table->integer('level');
			$table->string('description', 1000)->nullable();
			$table->string('shortcode', 1000)->nullable();
			$table->bigInteger('status_id')->unsigned();
			$table->bigInteger('group_id')->unsigned()->nullable();
			$table->integer('allow_type')->unsigned()->nullable();
			$table->bigInteger('module_id')->unsigned()->nullable()->index('FK_menus_modules');
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
		Schema::drop('menus');
	}

}
