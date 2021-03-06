<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phones',function($table)
		{
			$table->increments('id');
			$table->string('phone', 15);
			$table->integer('user_id', false)->unsigned();

			// Foreign keys
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('no action')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('phones');
	}

}
