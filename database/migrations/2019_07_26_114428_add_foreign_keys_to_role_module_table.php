<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRoleModuleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('role_module', function(Blueprint $table)
		{
			$table->foreign('module_id', 'FK_role_module_modules')->references('id')->on('modules')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('role_id', 'FK_role_module_roles')->references('id')->on('roles')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('role_module', function(Blueprint $table)
		{
			$table->dropForeign('FK_role_module_modules');
			$table->dropForeign('FK_role_module_roles');
		});
	}

}
