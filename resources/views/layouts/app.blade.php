<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Axon Task</title>
        <link rel="stylesheet" href="{{asset('assets/tailwind.min.css')}} ">
        <link rel="stylesheet" href="{{asset('assets/main.css')}}">
        <script src="{{asset('assets/jquery-3.7.1.min.js')}}"></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        @yield('content')

    </body>
</html>
