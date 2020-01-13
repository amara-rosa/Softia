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
    		<a href="{{ route('show_url') }}">
    			<div class="btn btn-primary">Url</div>
    		</a>		
    	</div>
    </div>
	<p>&nbsp;</p>
    <div class="row">
		<div class="col-md-12">
			{!! Form::open(['route' => 'submit_form']) !!}
			
			<div class="col-md-12">
				{{ Form::label('url', null, ['class' => 'col-md-4']) }}
				{{ Form::text('url', '', ['class' => 'col-md-7']) }}
			</div>
			<div class="col-md-12">
				{{ Form::label('param1', null, ['class' => 'col-md-4']) }}
				{{ Form::text('param1', '', ['class' => 'col-md-7']) }}
			</div>
			<div class="col-md-12">
				{{ Form::label('param2', null, ['class' => 'col-md-4']) }}
				{{ Form::text('param2', '', ['class' => 'col-md-7']) }}
			</div>

			{{ Form::submit('Trimite', ['class' => 'btn btn-success btn_submit']) }}
			
			{!! Form::close() !!}
		</div>
    </div>

</div>
<div id="block" class="loader"></div>
@endsection