<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubsubmenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subsubmenus', function($table){
			$table->increments('id');
			$table->string('submenu', 20);
			$table->string('route', 30);
			$table->integer('active', false)->unsigned();
			$table->string('dir', 45);
			$table->integer('submenu_id',false)->unsigned();
			$table->timestamps();

			// Foreign keys
			$table->foreign('submenu_id')->references('id')->on('submenus')->onUpdate('no action')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subsubmenus');
	}

}
