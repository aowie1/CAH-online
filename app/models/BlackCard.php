<?php

class BlackCard extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'black_cards';

	public function store()
	{
		$input = Input::all();
			'copy' => 'required|unique:black_cards',
			'blanks' => 'required|integer'
		);

		$validator = Validator::make($input, $rules);
		$validator_failure = $validator->fails();
		$messages = $validator->messages();

		if (!$validator_failure) {
			// $card->creator_id = User::current_user_id();
			$this->copy = Input::get('copy');
			$this->blanks = Input::get('blanks');
			$this->save();

			$messages->add('success', 'Card saved successfully!');
		}
		
		return $messages;
	}

}
	
