@extends('layouts.app')
@section('content')
    <h3 class="font-bold text-center sm:mt-6 text-xl mb-6">Найдите кого-нибудь поблизости!</h3>
    <div>
    @foreach($users as $user)
        @if($user->id != Auth::user()->id )
            <div>
            <div class="ml-10 text-3xl">
                <a href="{{url('/profile/' . $user->id)}}">{{ $user->name }}</a>
            </div>
            <div class="ml-10 text-2xl">
                {{ $user->about }}
            </div>
            <hr class="mt-3 ml-10 mr-10 bg-orange-200 text-orange-200 h-0.5 mb-10">
            </div>
            @endif
    @endforeach
    </div>
@endsection
