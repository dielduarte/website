<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNameEmailToBusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('buses', function ($table) {
            $table->string('name')->nullable();
            $table->string('email')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('buses', function ($table) {
            $table->dropColumn('name');
            $table->dropColumn('email');
        });
	}

}
