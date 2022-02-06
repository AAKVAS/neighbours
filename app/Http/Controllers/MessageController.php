<?php

namespace App\Http\Controllers;

use http\Message;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use App\Models\Messages;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index($id) {
        $otherUser = User::find($id);
        if(isset($otherUser)){
            $otherUserChats = $otherUser->chats;
            $thisUserChats = Auth::user()->chats;
            $chat = $otherUserChats->intersect($thisUserChats);
            //$messages = Messages::all()->where('chat_id', '=', $chat[0]->id);
            $messages = Messages::join('users', 'messages.user_id', '=', 'users.id')->where('chat_id', '=', $chat[0]->id)->get();

            return view('messages.index', ['messages' => $messages, 'otherUser' => $otherUser, 'chat_id' => $chat[0]->id]);
        }
        else {
            return redirect('home');
        }
    }

    public function store(Request $request) {
        $sender = $request->sender;
        $message = $request->message;
        $chat_id = $request->chat_id;

        $newMessage = Messages::create([
            'user_id' => $sender,
            'chat_id' => $chat_id,
            'message' => $message
        ]);

        return [
            'sender' => $sender,
            'message' => $message,
            'chat_id' => $chat_id
        ];
    }

}
