<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToQuotationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('quotations', function(Blueprint $table)
		{
			$table->foreign('area_id', 'FK_quotations_areas')->references('id')->on('areas')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('branch_id', 'FK_quotations_branchs')->references('id')->on('branchs')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('construction_id', 'FK_quotations_constructions')->references('id')->on('constructions')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('customer_id', 'FK_quotations_customers')->references('id')->on('customers')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('quotation_no_id', 'FK_quotations_quotation_nos')->references('id')->on('quotation_nos')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('status_id', 'FK_quotations_status')->references('id')->on('status')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_created', 'FK_quotations_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_updated', 'FK_quotations_users_2')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('quotations', function(Blueprint $table)
		{
			$table->dropForeign('FK_quotations_areas');
			$table->dropForeign('FK_quotations_branchs');
			$table->dropForeign('FK_quotations_constructions');
			$table->dropForeign('FK_quotations_customers');
			$table->dropForeign('FK_quotations_quotation_nos');
			$table->dropForeign('FK_quotations_status');
			$table->dropForeign('FK_quotations_users');
			$table->dropForeign('FK_quotations_users_2');
		});
	}

}
