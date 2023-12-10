<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <wireui:scripts />
        @vite("resources/css/app.css")

        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body class="bg-primary">
        {{ $slot }}

    @vite("resources/js/app.js")
    </body>
</html>
