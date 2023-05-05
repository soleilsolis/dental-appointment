<?php

namespace App\Http\Controllers;

use App\Http\Requests\SetupUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreUserRequest;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function store(StoreUserRequest $request)
    {
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'type' => $request->type,
            'birthdate' => $request->birthdate,
        ]);
        
        return response()->json(compact('data'));

    }

    public function update(UpdateUserRequest $request)
    {
        $data = User::find($request->id);
        
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password ? Hash::make($request->password) : $data->password;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->type = $request->type;
        $data->birthdate = $request->birthdate;

        $data->save();

        return response()->json(compact('data'));
    }
}
