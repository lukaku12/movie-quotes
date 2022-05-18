<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel = "icon" href ="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" type = "image/x-icon">
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('ui.movie_quotes') }}</title>
</head>
<body class="bg-neutral-600 overflow-x-hidden">
    <x-language-wrapper/>
    {{ $slot }}
    <x-flash/>
</body>
</html>
