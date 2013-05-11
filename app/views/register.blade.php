@extends('layouts.master')

@section('content')
	<h1>Register</h1>
	<?php 
	echo Form::open(array('url' => 'register'));
		echo Form::label('reg-username', 'Username: ');
		echo Form::text('reg_username', '',array('id'=>'reg-username'))."<br />";

		echo Form::label('reg-email', 'Email: ');
		echo Form::text('reg_email', '', array('id'=>'reg-email'))."<br />";

		echo Form::label('reg-password', 'Password: ');
		echo Form::password('reg_password', array('id'=>'reg-password'))."<br />";

		echo Form::label('reg-password-confirmation', 'Verify Password: ');
		echo Form::password('reg_password_confirmation', array('id'=>'reg-password-confirmation'))."<br />";

		echo Form::submit('Register');
	echo Form::close();
	?>
@stop