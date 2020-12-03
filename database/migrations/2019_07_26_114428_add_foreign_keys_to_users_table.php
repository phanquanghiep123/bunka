<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->foreign('lang_id', 'FK_users_languages')->references('id')->on('languages')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('branch_id')->references('id')->on('branchs')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('role_module_id')->references('id')->on('roles')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('status_id')->references('id')->on('status')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropForeign('FK_users_languages');
			$table->dropForeign('users_branch_id_foreign');
			$table->dropForeign('users_role_module_id_foreign');
			$table->dropForeign('users_status_id_foreign');
		});
	}

}
