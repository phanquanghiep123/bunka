<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuotationAllowChangeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quotation_allow_change', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('user_create')->unsigned()->nullable()->index('FK_quotation_allow_change_users');
			$table->bigInteger('user_id')->unsigned()->nullable()->index('FK_quotation_allow_change_users_2');
			$table->bigInteger('quotation_id')->unsigned()->nullable()->index('FK_quotation_allow_change_quotations');
			$table->timestamps();
			$table->unique(['user_create','user_id','quotation_id'], 'user_create_user_id_quotation_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('quotation_allow_change');
	}

}
