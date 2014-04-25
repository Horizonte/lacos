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
			$table->increments('id', 11);
			$table->string('phone', 15);
			//$table->integer('user_id__', 11);

			// Foreign keys
			//$table->foreign('user_id', 'FK_Phones_user_id')->references('id')->on('users')->onUpdate('no action');
			$table->integer('user_id', 11)->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
