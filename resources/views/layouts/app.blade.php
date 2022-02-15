<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-purple-700 py-6 fixed-top">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/search') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        Neighbours
                    </a>
                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Войти') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Зарегестрироваться') }}</a>
                        @endif
                    @else
                        <a href="{{ url('/profile/' . Auth::user()->id ) }}">{{ Auth::user()->name }}</a>

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Выйти</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>
        <div class="h-20">

        </div>
        <div class="w-4/6 float-left">
            @yield('content')
        </div>
        <div class="w-3/12 float-right h-48 position-fixed ml-9/12">
            <div class="text-xl mt-4">
                <a href="{{ url('/chatlist') }}">
                    <div class="flex justify-center">
                        Сообщения
                        <img class="ml-6 mt-1 h-[18px] w-[25px] " src="{{ URL('images/email-icon-png-transparent-email-iconpng-images-pluspng-email-icon-png-2400_1714.png') }}">
                    </div>
                </a>
            </div>
            <div class="text-xl mt-4">
                <a href="{{ url('/highlightusers') }}">
                    <div class="flex justify-center">
                        Помеченные люди
                        <img class="ml-6 mt-1 h-[26px] w-[26px] " src="{{ URL('images/highlight.png') }}">
                    </div>
                </a>
            </div>
        </div>

    </div>
</body>
</html>
