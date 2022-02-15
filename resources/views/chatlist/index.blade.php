@extends('layouts.app')
@section('content')
    @foreach($chatsInfo as $chatInfo)
        <a href="{{ url('/messages/'. $chatInfo['otherUser']) }}">
            <div class="mt-4 ml-10 mb-2 text-2xl">
                {{ $chatInfo['names'] }}
            </div>
            <div class="mt-2 ml-10 mb-10 text-xl">
                {{ $chatInfo['lastMessage'] }}
            </div>
        </a>


    @endforeach
@endsection
