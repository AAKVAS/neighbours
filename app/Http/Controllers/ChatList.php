<?php

namespace App\Http\Controllers;

use App\Models\ChatUser;
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
            $usersInChat = ChatUser::where('chat_id', '=', $chat->id)
                ->where('user_id', '<>', Auth::user()->id)
                ->select('chat_id', 'user_id')->distinct()->get()->sortBy('user_id');

            $lastMessageTime = Messages::where('chat_id', '=', $chat->id)->max('created_at');
            $lastMessage = Messages::where('created_at', '=', $lastMessageTime)->select('message', 'user_id')->first();

            foreach ($usersInChat as $user) {
                if ($lastMessage != null) {
                    $names .= User::find($user->user_id)->name . ' ';
                    $chatsInfo[$chat->id] = [
                        'names' => $names,
                        'lastMessage' => $lastMessage->message,
                        'user' => User::find($lastMessage->user_id)->name,
                        'otherUser' => $user->user_id
                    ];
                }


            }
        }
        return view('chatlist.index', ['chatsInfo' => $chatsInfo]);
    }
}
