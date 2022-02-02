@extends('layouts.app')

@section('content')

    @if(isset(Auth::user()->id))
        <p class="text-center text-xl mt-3">Вы общаетесь с {{ $otherUser->name }}</p>
        @foreach($messages as $message)
            <p>
                {{ $message->name }}: {{ $message->message }}
            </p>
        @endforeach
    @else
        <h1 class="text-center text-xl mt-3">Вы не вошли в учётную запись</h1>
    @endif
@endsection

