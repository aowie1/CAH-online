<?php

use Illuminate\Database\Migrations\Migration;

class AlterTableAddUsernameColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table){
			$table->string('username');
		});

		DB::statement('ALTER TABLE users MODIFY username varchar(255) AFTER id;');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table){
			$table->dropColumn('username');
		});
	}

}