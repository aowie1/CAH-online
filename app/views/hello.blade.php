@extends('layouts.master')

@section('content')
	<h1>Home</h1>
	<div class="content">
			<div class="username">
				Your Username:
				<input type="text" name="username" />
			</div>
			<div>
				<a class="button" href="#">
					Create New Game
				</a>
				<a class="button" href="#">
					Join Existing Game
				</a>
			</div>
			<div class="credits">
				Credits
				<br /><br />
				Cards Against Humanity is distributed under a Creative Commons BY-NC-SA 2.0 license. That means you can use and remix the game for free, but you can't sell it without our permission.
				<br /><br />
				Think very carefully before emailing us at cardsagainsthumanity@gmail.com.
			</div>
		</div>
@stop