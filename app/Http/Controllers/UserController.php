<?php

namespace App\Http\Controllers;

use App\Http\Requests\SetupUserRequest;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        
    }

    public function setup(SetupUserRequest $request)
    {
        $user = User::find(Auth::id());

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;

        $user->save();

        $data = $user;

        return response()->json(compact('data'));
    }
}
