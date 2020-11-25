<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRequestQuotationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('request_quotations', function(Blueprint $table)
		{
			$table->foreign('quotation_id', 'FK_request_quotations_quotations')->references('id')->on('quotations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('status_change', 'FK_request_quotations_status')->references('id')->on('status')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_id', 'FK_request_quotations_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_old_id', 'FK_request_quotations_users_2')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('request_quotations', function(Blueprint $table)
		{
			$table->dropForeign('FK_request_quotations_quotations');
			$table->dropForeign('FK_request_quotations_status');
			$table->dropForeign('FK_request_quotations_users');
			$table->dropForeign('FK_request_quotations_users_2');
		});
	}

}
