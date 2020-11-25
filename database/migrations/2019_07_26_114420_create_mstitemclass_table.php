<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMstitemclassTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mstitemclass', function(Blueprint $table)
		{
			$table->integer('ItemClassId', true);
			$table->string('ItemClassName', 200);
			$table->string('Unit', 50)->nullable();
			$table->boolean('WInputFlg')->nullable();
			$table->boolean('HInputFlg')->nullable();
			$table->boolean('QInputFlg')->nullable();
			$table->string('PricePattern', 10);
			$table->integer('DispOrder');
			$table->integer('ParentItemClassId')->nullable();
			$table->string('FormatPattern', 100)->nullable();
			$table->string('ItemClassNameVN', 100)->nullable();
			$table->string('FormatPatternVN', 100)->nullable();
			$table->string('ItemClassNameJP', 100)->nullable();
			$table->string('FormatPatternJP', 100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mstitemclass');
	}

}
