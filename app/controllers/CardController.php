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
		$this->layout->content = View::make('cards.'.$type.'.create')->with('messages', $this->messages->getMessageBag());;
	}

	public function postStore($type)
	{
		$card_model = (string) ucfirst($type).'Card';

		$card = new $card_model;
		$messages = $card->store();

		if ($messages->get('success'))
		{
			$this->layout->content =  View::make('cards.'.$type.'.create')->with('messages', $messages->getMessageBag());
		}
		else
		{
			$this->layout->content =  View::make('cards.'.$type.'.create')->with('messages', $messages->getMessageBag());
		}
	}

}