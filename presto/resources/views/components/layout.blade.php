<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? ''}}</title>

    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{$style ?? ''}}
</head>
<body>
    
    <x-nav />

    <div class="min-vh-100">
        {{$slot}}
    </div>

    <x-footer />
    
    @livewireScripts

    <script src="{{ asset('js/app.js') }}"></script>
    {!! isset($script) ? $script : '' !!}


</body>
</html>