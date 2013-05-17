<?php

class AuthController extends Controller {
	public $restful = true;

	public function postRegister()
	{
		$user = new User;
		$user_reg = $user->registerNewUser();

		if ($user_reg !== TRUE)
		{
			return Redirect::to('register')->withErrors($user_reg);
		}
	}

}