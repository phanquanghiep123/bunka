<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('abbreviations', 191)->nullable();
            $table->text('address')->nullable();
            $table->string('fax', 191)->nullable();
            $table->string('tax_code', 191)->nullable();
            $table->integer('type_of_business')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('abbreviations');
            $table->dropColumn('address');
            $table->dropColumn('fax');
            $table->dropColumn('tax_code');
            $table->dropColumn('type_of_business');
        });
    }
}
