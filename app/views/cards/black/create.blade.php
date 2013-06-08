@extends('layouts.master')

@section('content')
{{ Form::open() }}
	{{ Form::token() }}
	{{ Form::label('copy') }} {{ Form::text('copy') }}
	{{ Form::label('blanks') }} {{ Form::text('blanks') }}
	{{ Form::submit('Submit') }}
{{ Form::close() }}
@stop