<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrayersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	 
	public function up()
	{
		//
		Schema::create('prayers', function($table)
		{
			$table->increments('id'); 
			$table->json('coordinates');
			$table->integer('user');
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
		//
		Schema::drop('prayers');
	}

}
