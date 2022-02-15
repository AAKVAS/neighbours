<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatList extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index () {
        $thisUser = Auth::user();
        $chats = $thisUser->chats;
        $chatsInfo = array();
        foreach ($chats as $chat) {
            $names = '';
            $usersInChat = Messages::where('chat_id', '=', $chat->id)
                ->where( 'user_id', '<>', Auth::user()->id)->select('chat_id', 'user_id')->distinct()->get()->sortBy('user_id');
            $lastMessageTime = Messages::where('chat_id', '=', $chat->id)->max('created_at');
            $lastMessage = Messages::where('created_at', '=', $lastMessageTime)->select('message')->get();
            foreach ($usersInChat as $user) {
                $names .= User::find($user->user_id)->name . ' ';
                $chatsInfo[$chat->id] = [
                    'names' => $names,
                    'lastMessage' => $lastMessage[0]->message,
                    'otherUser' => $user->user_id
                    ];
            }
        }
        return view('chatlist.index', ['chatsInfo' => $chatsInfo]);
    }
}
