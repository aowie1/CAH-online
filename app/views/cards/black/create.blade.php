@section('content')
{{ Form::open(array('url' => 'card/black')) }}
	{{ Form::text('name') }}
	{{ Form::submit() }}
{{ Form::close() }}
@stop