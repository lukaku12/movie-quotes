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
<body
    class="flex flex-col justify-center items-center bg-neutral-600 w-screen h-screen overflow-x-hidden">
    <div class="fixed left-4 flex flex-col gap-2  justify-center">
        <x-language language="en"/>
        <x-language language="ka" active="{{ true }}"/>
    </div>
    {{ $slot }}
</body>
</html>
