@extends('layouts.app')

@section('content')

    @if(isset(Auth::user()->id))
        <div class="w-4/6">
            <div class="text-right text-xl mt-3 mb-6 mr-10">
                <a href="{{ url('/profile/' . $otherUser->id) }}">{{ $otherUser->name }}</a>
            </div>

            @foreach($messages as $message)
                @if($message->user_id == Auth::user()->id)
                    <div class="ml-10 mb-8 text-xl bg-blue-200 break-all p-4 rounded-md h-auto">
                @else
                    <div class="ml-10 mb-8 text-xl bg-gray-200 break-all p-4 rounded-md h-auto">
                @endif
                    <div class=" text-gray-500 text-lg">
                        {{ $message->name }}:
                    </div >
                    {{ $message->message }}
                </div>
            @endforeach
            <input type="text" id="inputMessage" class="w-5/6 ml-10 h-12 p-2">
            <img id="sendMessageButton" src="{{ URL('images/188-1882365_send-button-png-send-button-icon-png.png') }}" class="h-10 float-right">
        </div>
        <script type="application/javascript" src=" {{ URL('js/messages.js') }}">
        </script>
    @else
        <h1 class="text-center text-xl mt-3">Вы не вошли в учётную запись</h1>
    @endif
@endsection

