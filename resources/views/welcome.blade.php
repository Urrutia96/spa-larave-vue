<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Santos96</title>
        <link href='https://fonts.googleapis.com/css?family=Ubuntu:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div id="app">
            <layout></layout>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
