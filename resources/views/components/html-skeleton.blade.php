<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Website Title' }}</title>

    {{-- Hook: before head --}}
    @isset($beforeHead)
        {{ $beforeHead }}
    @endisset

    <!-- Styles -->
    @vite('resources/css/app.css')

    {{-- Hook: after head --}}
    @isset($afterHead)
        {{ $afterHead }}
    @endisset
</head>
<body>
    {{-- Hook: before body --}}
    @isset($beforeBody)
        {{ $beforeBody }}
    @endisset

    {{ $slot }}

    {{-- Hook: after body --}}
    @isset($afterBody)
        {{ $afterBody }}
    @endisset

    <!-- Scripts -->
    @vite('resources/js/app.js')
</body>
</html>