@extends('layouts.app')
@section('content')

    <div class="">
        <h3 class="font-bold text-center sm:mt-6 text-xl mb-6 ">Найдите кого-нибудь поблизости!</h3>
        <div class="flex justify-between ">
            <input type="text" id="search_parameter" name="tag" placeholder="Поиск людей" class="ml-10 w-5/6 h-12 mb-10 mr-5 p-2 rounded-md">
            <img id="magnifierImg" src=" {{ URL('images/1200px-Magnifying_glass_icon.svg.png') }}" class="w-[45px] h-[45px]">

        </div>

    @foreach($users as $user)
        @if($user->id != Auth::user()->id )
            <div class="user_info">
                <div class="flex justify-between">
                    <div>
                        <div class="ml-10 text-3xl">
                            <a href="{{url('/profile/' . $user->id)}}">{{ $user->name }}</a>
                        </div>
                        <div class="ml-10 text-2xl about_user">
                            {{ $user->about }}
                        </div>

                    </div>
                    <div class="flex justify-between">
                        <a href="{{ url('/messages/' . $user->id) }}">
                            <img src="{{ URL('images/email-icon-png-transparent-email-iconpng-images-pluspng-email-icon-png-2400_1714.png')}}"
                                 class="w-[25px] mt-1 h-[18px]">
                        </a>
                        <img src="{{ URL('images/highlight.png') }}"
                            class="w-[24px] h-[24px] ml-4 highlight_button"
                            name="{{ $user->id }}">
                    </div>
                </div>
                <hr class="mt-3 ml-10 bg-orange-200 text-orange-200 h-0.5 mb-10">
            </div>

            @endif
    @endforeach
    </div>
    <script>
        let highlightButton = document.getElementsByClassName('highlight_button');
        for (var j = 0; j < highlightButton.length; j++) {
            highlightButton[j].onclick = function () {
                $.ajax({
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{ route('highlightusers.store') }}',
                    type: 'POST',
                    data: {
                        user_id: {{ Auth::user()->id }},
                        highlighted_user_id:  this.getAttribute('name'),
                    },
                    success: function (data) {
                        console.log(data);
                    }
                });
            }
        }
    </script>
    <script type="application/javascript" src=" {{ URL('js/search.js') }}">
    </script>
@endsection
