<?php

class CardController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Cards Controller
	|--------------------------------------------------------------------------
	|
	| Handles all front-end interaction with cards
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public $restful = true;
	public $layout = 'layouts.master';

	public function getCreate($type)
	{
		$this->layout->content = View::make('cards.'.$type.'.create');
	}

	public function postStore($type)
	{
		$card_model = (string) ucfirst($type).'Card';

		$card = new $card_model;
		// $card->creator_id = User::current_user_id();
		$card->copy = Input::get('copy');
		$card->blanks = Input::get('blanks');

		if ($card->save())
		{
			$this->layout->content = View::make('hello')->with('success', 'Yay! Card created.');
		}
		else
		{
			$this->layout->content = View::make('hello')->with('error', 'Booo! Card not created.');
		}
	}

}