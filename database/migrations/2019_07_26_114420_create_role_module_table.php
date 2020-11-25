<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoleModuleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('role_module', function(Blueprint $table)
		{
			$table->bigInteger('module_id')->unsigned()->index('FK_role_module_modules');
			$table->bigInteger('role_id')->unsigned()->index('FK_role_module_roles');
			$table->boolean('view');
			$table->boolean('add');
			$table->boolean('update');
			$table->boolean('delete');
			$table->boolean('all');
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
		Schema::drop('role_module');
	}

}
