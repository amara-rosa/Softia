<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Test</title>
    <link rel="stylesheet" href="{{ URL::asset('css/all.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    @yield('css')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken'       => csrf_token(),
            'webSocketHost'   => config('params.websocket_host'),
            'userId'          => Auth::id(),
            'date_format'     => config('params.date.js.format'),
            'datetime_format' => config('params.date.js.dt_format'),
        ]); ?>
    </script>
</head>
<body>
    <div class="container top-bar">
        
    </div>
    <div class="container">
        @yield('content')
    </div>

    @hasSection ('compiled-script')
        @yield('compiled-script')
    @else
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        @yield('script')
    @endif
</body>
</html>
