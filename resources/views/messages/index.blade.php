@extends('layouts.app')

@section('content')

    @if(isset(Auth::user()->id))
        <div class="w-4/6" id="">

            <div class="text-right text-xl mt-3 mb-6 mr-10">
                <a href="{{ url('/profile/' . $otherUser->id) }}">{{ $otherUser->name }}</a>
            </div>
            <div id="messageArea">
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
                </div>
                <div class="h-20">
                </div>
                <div class="fixed-bottom mt-5 w-4/6 bg-gray-100 p-6">
                    <input type="text" id="inputMessage" class="w-5/6 ml-10 h-12 p-2 rounded-md">
                    <img id="sendMessageButton" src="{{ URL('images/pngwing.com.png') }}" class="h-10 float-right">
                </div>
                </div>
            <script src="{{asset('js/app.js')}}"></script>
            <script>
                chat_id = {{ $chat_id }};
                Echo.channel(`private-chats.${ chat_id }`)
                    .listen('MessageNotification', (e) => {
                        let messageArea = document.getElementById('messageArea');
                        let div = document.createElement('div');
                        if (e.user_id == {{ Auth::user()->id }}){
                            div.className = "ml-10 mb-8 text-xl bg-blue-200 break-all p-4 rounded-md h-auto";
                        }
                        else {
                            div.className = "ml-10 mb-8 text-xl bg-gray-200 break-all p-4 rounded-md h-auto";
                        }

                        let divText = document.createElement('div');
                        divText.className = "text-gray-500 text-lg";
                        divText.innerText = e.user_name;
                        messageArea.append(div);
                        div.append(divText);
                        div.innerHTML += e.message;
                    });

                let sendMessageButton = document.getElementById('sendMessageButton');
                let inputMessage = document.getElementById('inputMessage');

                sendMessageButton.onclick = function() {
                    $.ajax({
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '{{ route('messages.store') }}',
                        type: 'POST',
                        data: {
                            sender: {{ Auth::user()->id }},
                            chat_id: {{ $chat_id }},
                            message: inputMessage.value
                        },
                        success: function (data) {
                        }
                    })
                }


            </script>
    @else
        <h1 class="text-center text-xl mt-3">Вы не вошли в учётную запись</h1>
    @endif
@endsection

