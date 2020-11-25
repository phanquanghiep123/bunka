<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifications', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('user_receive')->unsigned()->nullable()->index('FK_notifications_users');
			$table->string('token', 200)->nullable();
			$table->bigInteger('user_send')->unsigned()->nullable()->index('FK_notifications_users_2');
			$table->string('url_detail', 500);
			$table->string('title', 500);
			$table->string('option', 500);
			$table->string('table', 500);
			$table->boolean('is_view')->nullable()->default(0);
			$table->boolean('view_detail')->nullable()->default(0);
			$table->bigInteger('general_id')->nullable()->default(0);
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
		Schema::drop('notifications');
	}

}
