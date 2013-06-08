<?php

class BlackCard extends Awareness\Aware {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'black_cards';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	// protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function Store()
	{
		$rules = array(
			'name' => 'required|max:200'
		);

		$user = Sentry::getUser();

		if ($user)
		{
			$this->name = Input::get('name');
			$this->user_id = $user->id;
		}
		
		return $this->save($rules);
	}
}