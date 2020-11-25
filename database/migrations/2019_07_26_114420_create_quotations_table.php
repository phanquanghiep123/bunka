<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuotationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quotations', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('quotation_number', 191)->nullable();
			$table->string('project');
			$table->dateTime('date_start')->nullable();
			$table->bigInteger('customer_id')->unsigned()->nullable()->index('FK_quotations_customers');
			$table->bigInteger('branch_id')->unsigned()->nullable()->index('FK_quotations_branchs');
			$table->float('tax_id', 10, 0)->unsigned()->nullable();
			$table->float('tax_value', 10, 0)->unsigned()->nullable();
			$table->bigInteger('rate_id')->unsigned()->nullable();
			$table->bigInteger('area_id')->unsigned()->nullable()->index('FK_quotations_areas');
			$table->bigInteger('construction_id')->unsigned()->nullable()->index('FK_quotations_constructions');
			$table->bigInteger('status_id')->unsigned()->index('FK_quotations_status');
			$table->bigInteger('quotation_no_id')->unsigned()->nullable()->index('FK_quotations_quotation_nos');
			$table->bigInteger('user_created')->unsigned()->nullable()->index('FK_quotations_users');
			$table->bigInteger('user_updated')->unsigned()->nullable()->index('FK_quotations_users_2');
			$table->string('customer_code')->nullable();
			$table->string('customer_authorized_name')->nullable();
			$table->string('customer_construction_owner')->nullable();
			$table->string('customer_construction_name')->nullable();
			$table->string('customer_construction_address')->nullable();
			$table->string('customer_construction_phone')->nullable();
			$table->string('customer_construction_fax')->nullable();
			$table->string('customer_construction_manager')->nullable();
			$table->float('discount', 10, 0)->nullable();
			$table->float('discount1', 10, 0)->nullable();
			$table->float('discount2', 10, 0)->nullable();
			$table->integer('discount_active')->nullable();
			$table->float('sub_total', 10, 0)->nullable();
			$table->float('tax_price', 10, 0)->nullable();
			$table->float('product_price', 10, 0)->nullable();
			$table->float('other_price', 10, 0)->nullable();
			$table->float('grand_sub_total', 10, 0)->nullable();
			$table->float('total', 10, 0)->nullable();
			$table->bigInteger('pid')->nullable();
			$table->string('path', 1000)->nullable();
			$table->bigInteger('reversion_pid')->nullable()->default(0);
			$table->bigInteger('reversion_root_id')->nullable()->default(0);
			$table->integer('reversion')->nullable()->default(0);
			$table->boolean('index_reversion')->nullable()->default(1);
			$table->string('path_reversion', 1000)->nullable()->default('0');
			$table->string('comment', 1000)->nullable();
			$table->boolean('not_sent_notifition')->nullable()->default(0);
			$table->boolean('onsave')->nullable()->default(0);
			$table->timestamps();
			$table->unique(['quotation_number','reversion_pid','reversion'], 'quotation_number_reversion_id_reversion');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('quotations');
	}

}
