<?php

use Illuminate\Database\Migrations\Migration;

class Test extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		dd(DB::run('SELECT * FROM users'));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}