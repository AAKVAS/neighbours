<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Chat;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('chats.{id}', function ($user, $chat_id) {
    foreach (Chat::find($chat_id)->users as $chatUser){
        if ($user->id == $chatUser->id) {
            return true;
        }
    }
    return false;
/*
    foreach (Chat::find($chat[0]->id)->users as $chatUser){
        if (Auth::user()->id == $chatUser->id) {
            dd('true');
        }
    }
    */
});

