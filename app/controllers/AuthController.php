<?php

class AuthController extends Controller {
	public $restful = true;

	public function postRegister()
	{
		// dd(Input::get());
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

}