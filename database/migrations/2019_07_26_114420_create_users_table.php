<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('first_name', 500);
			$table->string('last_name', 500);
			$table->string('email', 191)->unique('email');
			$table->string('password');
			$table->string('contact_number', 100)->nullable();
			$table->string('photo', 500)->nullable();
			$table->boolean('is_sys');
			$table->bigInteger('status_id')->unsigned()->nullable()->index('users_status_id_foreign');
			$table->bigInteger('role_module_id')->unsigned()->index('users_role_module_id_foreign');
			$table->bigInteger('branch_id')->unsigned()->index('users_branch_id_foreign');
			$table->bigInteger('lang_id')->unsigned()->nullable()->default(3)->index('FK_users_languages');
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->boolean('is_default');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
