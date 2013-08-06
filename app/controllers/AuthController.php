<?php

class AuthController extends Controller {
	public $restful = true;

	public function getRegister()
	{
		$this->_check_user_state();

		return View::make('auth.register.form');
	}

	public function postRegister()
	{
		$this->_check_user_state();

		$user = new User;
		$validatorStatus = $user->register();
		$validatorErrors = $validatorStatus->all();

		if (!empty($validatorErrors))
		{
			return Redirect::to('register')->withErrors($validatorStatus);
		}
		else
		{
			return Redirect::to('register/success');
		}
	}

	public function getLogin()
	{
		$this->_check_user_state();

		return View::make('auth.login.form');
	}

	public function postLogin()
	{
		$this->_check_user_state();

		if (User::authenticate())
		{
			return View::make('auth.login.form');
		}
	}

	private function _check_user_state()
	{
		if (Sentry::check())
		{
			return Redirect::to('myaccount');
		}
	}
}