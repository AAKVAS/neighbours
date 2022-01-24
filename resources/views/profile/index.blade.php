@extends('layouts.app')

@section('content')

@if(isset(Auth::user()->id))
    <div class="w-3/4 py-10">
        <div class="float-right">
            <a href="/profile/{{ Auth::user()->id }}/edit" class="border-b-2 pd-2 border-dotted italic text-green-500">
                Edit &rarr;
            </a>
        </div>
        <div class="m-auto ml-10 ">
            <div class="uppercase text-gray-700 font-blond text-xl italic pb-5">
                Имя: {{ $user->name }}
            </div>
            <div class="uppercase text-gray-700 font-blond text-xl italic pb-5">
                Город: {{ $user->city }}
            </div>
            <div class="uppercase text-gray-700 font-blond text-xl italic pb-5">
                Описание: {{ $user->about }}
            </div>
        </div>
    </div>
@endif
@endsection

