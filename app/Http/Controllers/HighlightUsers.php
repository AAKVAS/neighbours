<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HighlightUser;
use Illuminate\Support\Facades\Auth;

class HighlightUsers extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $higlightedUsers = HighlightUser::join('users', 'highlighted_users.highlighted_user_id', '=', 'users.id')
            ->where('user_id', '=', Auth::user()->id)
            ->select('*')
            ->get();

        return view('highlightusers.index', ['highlightedUsers' => $higlightedUsers]);
    }

    public function store(Request $request) {
        $highlighted_user_id = $request->highlighted_user_id;
        $user_id = $request->user_id;
        $highlighted_user = HighlightUser::create([
            'user_id' => $user_id,
            'highlighted_user_id' => $highlighted_user_id
        ]);
        return ['user_id' => $user_id,
            'highlighted_user_id' => $highlighted_user_id];
    }
}
