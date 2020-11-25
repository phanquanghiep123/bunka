<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBranchsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('branchs', function(Blueprint $table)
		{
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
		Schema::table('branchs', function(Blueprint $table)
		{
			$table->dropForeign('branchs_status_id_foreign');
		});
	}

}
