@extends('layouts.app')

@section('css')
<style>
	.container {
		margin-bottom: 25px;
	}
	#img_holder {
		display: block;
		margin-left: auto;
		margin-right: auto;
		width: 50%;
	}
	.img {
		width: 100%;
	}
	.hd {
		display: none;
	}
	.msg_error {
		display: none;
		margin-top: 15px;
	}
	#desc {
		margin: 15px 0;
	}
	#block {
		display: none;
		width: 100%;
		height: 100%;
		position: fixed;
		top: 0;
		left: 0;
		z-index: 2;
	}
	.loader {
		opacity: 0.5;
		background-color: #ddd;
		background-image: url(/images/spinner.gif);
		background-size: 25px 25px;
		background-position: center center;
		background-repeat: no-repeat;
		z-index: 16777271;
	}
</style>
@endsection

@section('content')
<div class="container">
	<p>&nbsp;</p>
    <div class="row">
    	<div id="img_holder" class="col-md-10 col-md-offset-1">
			<img id="img" class="img" src="{{ $data->url }}" title="{{ $data->title }}">
			<img id="img_hd" class="img hd" src="{{ $data->hdurl }}" title="{{ $data->title }}">
		</div>

		<p id="desc">{{ $data->explanation }}</p>

		<div class="col-md-12">
			{!! Form::open(['route' => 'change', 'id' => 'change_image_form']) !!}
			
			{{ Form::hidden('date', date('Y-m-d')) }}
			{{ Form::hidden('hd', 0) }}

			<div class="row">
				<div class="col-md-3">
					<button name="submit" value="back" class="btn btn-success">Back</button>
				</div>
				<div class="col-md-3">
					<span id="show_date">{{ $data->date }}</span>
				</div>
				<div class="col-md-3">
					<div id="show_hd" class="btn btn-danger">HD</div>
				</div>
				<div class="col-md-3">
					<button name="submit" value="next" class="btn btn-success">Next</button>
				</div>
			</div>
			
			{!! Form::close() !!}

			<p class="msg_error">Connection error.</p>
		</div>

    </div>

</div>
<div id="block" class="loader"></div>
@endsection

@section('script')
	<script type="text/javascript">
		var change_image_url = @json(route('change'));
	</script>
	<script src="{{ URL::asset('js/test.js') }}" crossorigin="anonymous"></script>
@endsection