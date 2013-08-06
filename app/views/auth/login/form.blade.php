@extends('layouts.master')

@section('content')
	<h1>Login</h1>
	<?php 
	echo Form::open();
		echo Form::label('username', 'Username: ');
		echo Form::text('username', '',array('id'=>'username'))."<br />";

		echo Form::label('password', 'Password: ');
		echo Form::text('password', '', array('id'=>'password'))."<br />";

		echo Form::submit('Login');
	echo Form::close();
	?>
@stop

@section('errors')
	@foreach($errors->all() as $error)
		{{ $error }}<br />
	@endforeach
@stop