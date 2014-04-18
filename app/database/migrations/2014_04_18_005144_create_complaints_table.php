<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComplaintsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('complaints', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->string('email', 100);
			$table->integer('bus_id')->unsigned();
			$table->foreign('bus_id')->references('id')->on('buses');
			$table->integer('reason_id')->unsigned();
			$table->foreign('reason_id')->references('id')->on('reasons');
			$table->text('story');
			$table->integer('reported')->default(0);
			$table->softDeletes();
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
		Schema::drop('complaints');
	}

}
