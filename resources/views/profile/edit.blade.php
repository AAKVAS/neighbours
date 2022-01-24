@extends('layouts.app')

@section('content')
    <div class="m-auto text-center py-10">
        <div class="text-center">
            <h1 class="text-3xl bold">
                Редактировать профиль
            </h1>
        </div>
    </div>
        <div class="flex justify-center pt-8">
            <form action="/profile/{{ $user->id }}" method="POST" class="w-2/6">
                @csrf
                @method("PUT")
                <div class="block">
                    <input
                        type="text"
                        class="block shadow-5xl mb-10 p-2 w-full italic placeholder-gray-400 rounded-md"
                        name="name"
                        placeholder="Ваше имя"
                        value="{{ $user->name }}">
                    <input
                        type="text"
                        class="block shadow-5xl mb-10 p-2 w-full italic placeholder-gray-400 rounded-md"
                        name="email"
                        placeholder="Ваша почта"
                        value="{{ $user->email }}">
                    <input
                        type="text"
                        class="block shadow-5xl mb-10 p-2 w-full italic placeholder-gray-400 rounded-md"
                        name="about"
                        placeholder="О себе"
                        value="{{ $user->about }}">
                    <input
                        type="text"
                        class="block shadow-5xl mb-10 p-2 w-full italic placeholder-gray-400 rounded-md"
                        name="city"
                        placeholder="Ваш город"
                        value="{{ $user->city }}">
                    <button type="submit" class="bg-green-400 block shadow-5xl mb-10 p-2 w-full rounded-md uppercase font-bold">
                        Подтвердить
                    </button>
                </div>
            </form>
        </div>
    @if($errors->any())
        <div class="w-4/6 m-auto text-center">
            @foreach($errors->all() as $item)
                <li class="text-red-500 list-none">
                    {{ $item }}
                </li>
            @endforeach
        </div>
    @endif
@endsection
