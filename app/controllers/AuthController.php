<?php

class AuthController extends Controller {
	public $restful = true;

	public function postRegister()
	{
		echo "a";
		User::registerNewUser();
	}

}