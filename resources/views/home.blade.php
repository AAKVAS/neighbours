@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Neighbours - сайт для поиска людей по близости. Здесь вы можете общаться с интерисующими вас людьми.
            </header>

            <div class="w-full p-6">
                <p class="text-gray-700 mb-11">
                    Вы успешно вошли в аккаунт!
                </p>
                <a href="{{ url('/search') }}" class="border border-green-600 bg-green-400 p-2 rounded-md">Начать искать</a>
            </div>
        </section>
    </div>
</main>
@endsection
