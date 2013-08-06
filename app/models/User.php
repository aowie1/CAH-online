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
	public function register(){
		$input = Input::all();
		$rules = array(
			'reg_username' => 'required',
			'reg_email' => 'required|email',
			'recaptcha_response_field' => 'required|recaptcha',
			'reg_password' => 'required|confirmed',
		);

		$validator = Validator::make($input,$rules);
		$validator_failure = $validator->fails();
		$messages = $validator->messages();

		if (!$validator_failure) {
			try
			{
			    // Let's register a user.
			    $user = Sentry::register(array(
			    	'username' => Input::get('username'),
			        'email'    => Input::get('reg_email'),
			        'password' => Input::get('reg_password')
			    ));

			    // Let's get the activation code
			    $activationCode = $user->getActivationCode();

			    // Send activation code to the user so he can activate the account
			}
			catch (Cartalyst\Sentry\Users\UserExistsException $e)
			{
			    $messages->add('reg_username', 'User with this login already exists.');
			}
		}

		return $messages;
	}

	public static function authenticate()
	{
		try
		{
		    // Set login credentials
		    $credentials = array(
		        'username'    => Input::get('username'),
		        'password' => Input::get('password'),
		    );

		    // Try to authenticate the user
		    return $user = Sentry::authenticateAndRemember($credentials);
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    echo 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    echo 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
		    echo 'Wrong password, try again.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    echo 'User was not found.';
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    echo 'User is not activated.';
		}
	}
}