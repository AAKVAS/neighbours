<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rules\Uppercase;
use App\Models\User;
use App\Http\Requests\CreateValidationRequest;
use App\Rules\NotInteger;

class ProfileController extends Controller
{
    public function __construct()
    {

    }

    public function index($id) {
        $user = User::find($id);
        if(isset($user)){
            $user = $user->toJson();
            $user = json_decode($user);
            return view('profile.index', [
                'user' => $user
            ]);
        }
        else {
            return redirect('home');
        }

    }

    public function edit($id) {
        $user = User::find($id);
        if(isset($user)){
            $user = $user->toJson();
            $user = json_decode($user);
            return view('profile.edit', [
                'user' => $user
            ]);
        }
        else {
            return redirect('home');
        }
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'city' => new NotInteger,
            'about' => 'required'
        ]);

        $user = User::where('id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'about' => $request->about,
                'city' => $request->city
            ]);

        return redirect('/profile/' . $id);
    }
}
