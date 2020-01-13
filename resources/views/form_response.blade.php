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
    		<a href="{{ route('show_form') }}">
    			<div class="btn btn-primary">Formular</div>
    		</a>
    	</div>
    </div>
	<p>&nbsp;</p>
    <div class="row">
		<div class="col-md-12">
			<b>Request Status Code:</b><br/>
			{{ $response_code }}
		</div>
		<p>&nbsp;</p>
		<div class="col-md-12">
			<b>Headers</b><br/>
			<ul>
			@foreach($headers as $header)
				<li>{{ $header }}</li>
			@endforeach
			</ul>
		</div>
		<p>&nbsp;</p>
		<div class="col-md-12">
			<b>Content:</b><br/>
			{!! $body !!}
		</div>
    </div>

</div>
@endsection