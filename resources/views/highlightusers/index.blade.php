@extends('layouts.app')

@section('content')

    <h3 class="font-bold text-center sm:mt-6 text-xl mb-6 ">Помеченные люди</h3>
    @forelse($highlightedUsers as $user)
        <div class="user_info">
            <div class="flex justify-between">
                    <div class="ml-10 text-2xl">
                        <a href="{{ url('profile/'. $user->id) }}">
                            {{ $user->name }}
                        </a>
                        <div>
                            {{ $user->about }}
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <a href="{{ url('/messages/' . $user->id) }}">
                            <img src="{{ URL('images/email-icon-png-transparent-email-iconpng-images-pluspng-email-icon-png-2400_1714.png')}}"
                                 class="w-[25px] mt-1 h-[18px]">
                        </a>
                    </div>
            </div>
        </div>
        <hr class="mt-3 ml-10 bg-orange-200 text-orange-200 h-0.5 mb-10">
    @empty
        <div class="flex justify-center ml-10 text-2xl">
            У вас нет отмеченных людей
        </div>
    @endforelse

@endsection
