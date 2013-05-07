<?php

use Illuminate\Database\Migrations\Migration;

class BaseSchema extends Migration {

  /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('black_cards', function($table){
	      $table->increments('id');
	      $table->integer('creator_id')->unsigned();
	      $table->string('copy')->unique();
	      $table->integer('blanks');
	      $table->integer('reports');
	      $table->timestamps();
	    });

	    Schema::create('white_cards', function($table){
	      $table->increments('id');
	      $table->integer('creator_id')->unsigned();
	      $table->string('copy')->unique();
	      $table->integer('blanks');
	      $table->integer('reports');
	      $table->timestamps();
	    });

	    Schema::create('banned_copy', function($table){
	      $table->increments('id');
	      $table->string('copy')->unique();
	      $table->timestamps();
	    });

	    Schema::create('player_types', function($table){
	      $table->increments('id');
	      $table->string('title', 50)->unique();
	    });

	    Schema::create('games', function($table){
	      $table->increments('id');
	      $table->string('name', 50)->unique();
	      $table->integer('player_limit');
	      $table->string('pw');
	      $table->integer('round');
	      $table->timestamps();
	    });

	    Schema::create('kick_votes', function($table){
	      $table->increments('id');
	      $table->integer('user_id')->unsigned();
	      $table->integer('game_id')->unsigned();
	      $table->integer('votes');
	      $table->foreign('game_id')->references('id')->on('games')->on_delete('cascade');
	    });

	    Schema::create('kicked_users', function($table){
	      $table->increments('id');
	      $table->integer('game_id')->unsigned();
	      $table->integer('user_id')->unsigned();
	      $table->timestamps();
	      $table->foreign('game_id')->references('id')->on('games')->on_delete('cascade');
	    });

	    Schema::create('active_cards', function($table){
	      $table->increments('id');
	      $table->integer('white_card_id')->unsigned();
	      $table->integer('order');
	      $table->integer('user_id')->unsigned();
	      $table->integer('game_id')->unsigned();
	      $table->integer('is_wagered');
	      $table->foreign('game_id')->references('id')->on('games')->on_delete('cascade');
	    });

	    Schema::create('active_players', function($table){
	      $table->increments('id');
	      $table->integer('game_id')->unsigned();
	      $table->integer('user_id')->unsigned();
	      $table->integer('player_type_id')->unsigned();
	      $table->foreign('game_id')->references('id')->on('games')->on_delete('cascade');
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('active_players', function($table){
	      $table->dropForeign('active_players_game_id_foreign');
	      $table->drop();
	    });

	    Schema::table('active_cards', function($table){
	      $table->dropForeign('active_cards_game_id_foreign');
	      $table->drop();
	    });
	    
	    Schema::table('kicked_users', function($table){
	      $table->dropForeign('kicked_users_game_id_foreign');
	      $table->drop();
	    });

	    Schema::table('kick_votes', function($table){
	      $table->dropForeign('kick_votes_game_id_foreign');
	      $table->drop();
	    });

	    Schema::table('games', function($table){
	      $table->drop();
	    });

	    Schema::table('player_types', function($table){
	      $table->drop();
	    });

	    Schema::table('banned_copy', function($table){
	      $table->drop();
	    });

	    Schema::table('white_cards', function($table){
	      $table->drop();
	    });

	    Schema::table('black_cards', function($table){
	      $table->drop();
	    });

	}

}