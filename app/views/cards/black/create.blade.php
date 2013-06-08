@extends('layouts.master')

@section('content')
@if (!empty($messages))
	@foreach($messages->all() as $message)
		<p>{{ $message }}</p>
	@endforeach
@endif

{{ Form::open() }}
	{{ Form::token() }}
	{{ Form::label('copy') }} {{ Form::text('copy') }}
	{{ Form::label('blanks') }} {{ Form::text('blanks') }}
	{{ Form::submit('Submit') }}
{{ Form::close() }}
@stop