<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {!! SEO::generate() !!}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('after_head_open')
    <title>{{ $title ?? config('app.name', 'Clean CMS') }}</title>
    @vite('resources/css/app.css')
    @stack('before_head_close')
</head>
<body>
    @stack('after_body_open')
    {{$slot}}
    @vite('resources/js/app.js')
    @stack('before_body_close')
</body>
</html>