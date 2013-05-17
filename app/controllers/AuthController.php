<?php

class AuthController extends Controller {
	public $restful = true;

	public function postRegister()
	{
		$user = new User;
		$validatorStatus = $user->register();

		if ($validatorStatus !== TRUE)
		{
			return Redirect::to('register')->withErrors($validatorStatus);
		}
	}

}