<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class SearchController extends Controller
{
    public function index() {
        $users = User::where('city', '=', Auth::user()->city)->get()->toJson();
        $users = json_decode($users);
        return view('search', [
            'users' => $users
        ]);
    }
}
