<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersDepartamentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_departaments', function($table){
			$table->increments('id');
			$table->integer('user_id', false)->unsigned();
			$table->integer('departament_id', false)->unsigned();
			$table->timestamps();

			// Foreign keys
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('no action')->onDelete('cascade');
			$table->foreign('departament_id')->references('id')->on('departaments')->onUpdate('no action')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_departaments');
	}

}
