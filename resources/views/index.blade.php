<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}"/>

    <meta name="og:title" content="{{ config('app.name') }}"/>
    <meta name="og:image" content="{{ asset('img/logo.png') }}"/>
    <meta name="og:site_name" content="{{ config('app.name') }}"/>
    <meta name="og:description" content="{{ config('app.name') }} - All you need for special moments"/>

    <title>{{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/public.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-icytwins to-icytwins-dark font-montserrat">
<div class="container mx-auto py-5 px-2 content-center">
    <div class="grid justify-items-center items-center">
        <div class="flex flex-row my-5">
            <div class="flex flex-wrap">
                <img class="w-24 h-24" src="{{ asset('img/logo.png') }}" alt="Logo">
            </div>
            <div class="flex flex-wrap w-auto justify-items-center items-center ml-3">
                <div class="grid grid-rows-2 overflow-hidden items-center w-auto">
                    <div class="overflow-hidden text-2xl text-gray-100">
                        <h1>{{ config('app.name') }}</h1>
                    </div>
                    <div class="overflow-hidden text-gray-300">
                        <p class="text-sm text-icytwins-light">All you need for special moments</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-row mt-10 mb-2">
            <h2 class="text-gray-100 text-base">SOCIAL MEDIA</h2>
        </div>
        @foreach($socials as $social)
        <div class="flex w-full sm:w-full md:w-full lg:w-1/2 flex-row mb-5">
            <a href="{{ $social->url }}" target="{{ $social->open_new_tab == true ? '_blank' : '_self' }}"
               class="w-full text-center text-lg md:text-xl text-gray-100 border-md border-2 bg-icytwins-dark border-icytwins-dark border-double rounded-md hover:bg-icytwins-light hover:border-icytwins-dark hover:text-icytwins-dark px-20 py-3"
            >{{ $social->name }}</a>
        </div>
        @endforeach
        <div class="flex flex-row mt-5 mb-2">
            <h2 class="text-gray-100 text-base">ORDER</h2>
        </div>
        @foreach($books as $book)
            <div class="flex w-full sm:w-full md:w-full lg:w-1/2 flex-row mb-5">
                <a href="{{ $book->url }}" target="{{ $book->open_new_tab == true ? '_blank' : '_self' }}"
                   class="w-full text-center text-lg md:text-xl text-gray-100 border-md border-2 bg-icytwins-dark border-icytwins-dark border-double rounded-md hover:bg-icytwins-light hover:border-icytwins-dark hover:text-icytwins-dark px-20 py-3"
                >{{ $book->name }}</a>
            </div>
        @endforeach
        <div class="flex flex-row mt-10">
            <p class="text-center text-gray-200 text-sm" ondblclick="document.location='{{ route('login') }}'">Copyright &copy; {{ date('Y') }}. {{ config('app.name') }}</p>
        </div>
    </div>
</div>
</body>
</html>
