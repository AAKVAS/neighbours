@extends('layouts.app')
@section('content')
    <h3 class="font-bold text-center sm:mt-6 text-xl mb-6">Найдите кого-нибудь поблизости!</h3>
    @foreach($users as $user)
        @if($user->id != Auth::user()->id )
            <div class="ml-10 text-3xl">
                 {{ $user->name }}
            </div>
            <div class="ml-10 text-2xl">
                {{ $user->about }}
            </div>
        @endif
    @endforeach
@endsection
