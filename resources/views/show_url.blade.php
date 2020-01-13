@extends('layouts.app')

@section('css')
<style>
	.container {
		margin-bottom: 25px;
	}
</style>
@endsection

@section('content')
<div class="container">
	<p>&nbsp;</p>
	<div class="row">
    	<div class="col-md-12">
    		<a href="{{ route('show_form') }}">
    			<div class="btn btn-primary">Formular</div>
    		</a>		
    	</div>
    </div>
	<p>&nbsp;</p>
    <div class="row">
		<div class="col-md-12">
			{!! Form::open(['route' => 'access_url']) !!}
			
			{{ Form::label('url', null) }}
			{{ Form::text('url', '') }}

			{{ Form::submit('Trimite', ['class' => 'btn btn-success btn_submit']) }}
			
			{!! Form::close() !!}
		</div>

    </div>

</div>
@endsection