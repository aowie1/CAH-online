<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}


	/**
	 * Register a new user on CAH
	 *
	 * @return string
	 */
	public static function registerNewUser(){
		$input = Input::all();
		$rules = array(
			'reg_username' => 'required',
			'reg_email' => 'email',
			'reg_password' => 'required|confirmed'
		);

		$validator = Validator::make($input,$rules);
		if($validator->fails()){
			return $validator->messages();
		}else {
			return TRUE;
		}
		
		try
		{
		    // Let's register a user.
		    $user = Sentry::register(array(
		        'email'    => 'john.doe@example.com',
		        'password' => 'test',
		    ));

		    // Let's get the activation code
		    $activationCode = $user->getActivationCode();

		    // Send activation code to the user so he can activate the account
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    echo 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    echo 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
		    echo 'User with this login already exists.';
		}
	}
}