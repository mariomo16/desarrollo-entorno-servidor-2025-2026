<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>
    <body>
        <h1>Me <b>ENCANTA</b> Laravel</h1>
        @if (isset($id))
            <h2>Me han pasado el Id: {{ $id }}</h2>
        @endif
    </body>
</html>
