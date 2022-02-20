@extends('layouts.app')
@section('content')
    <h3 class="font-bold text-center sm:mt-6 text-xl mb-6 ">Сообщения</h3>
    @foreach($chatsInfo as $chatInfo)
        <a href="{{ url('/messages/'. $chatInfo['otherUser']) }}">
            <div class="mt-4 ml-10 mb-2 text-2xl">
                 {{ $chatInfo['names'] }}
            </div>
            <div class="mt-2 ml-10 mb-10 text-xl">
                {{ $chatInfo['user'] }}: {{ $chatInfo['lastMessage'] }}
            </div>
        </a>


    @endforeach
@endsection
