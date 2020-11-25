<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToQuotationAllowChangeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('quotation_allow_change', function(Blueprint $table)
		{
			$table->foreign('quotation_id', 'FK_quotation_allow_change_quotations')->references('id')->on('quotations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_create', 'FK_quotation_allow_change_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_id', 'FK_quotation_allow_change_users_2')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('quotation_allow_change', function(Blueprint $table)
		{
			$table->dropForeign('FK_quotation_allow_change_quotations');
			$table->dropForeign('FK_quotation_allow_change_users');
			$table->dropForeign('FK_quotation_allow_change_users_2');
		});
	}

}
