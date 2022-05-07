<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel MovieQuotes</title>
</head>
<body class="bg-neutral-600 overflow-x-hidden">
    <x-language-wrapper/>
    {{ $slot }}
</body>
</html>
