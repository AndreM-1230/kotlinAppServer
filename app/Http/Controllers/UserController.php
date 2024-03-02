<?php

namespace App\Http\Controllers;



use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //return User::all();
        return response()->json(['message' => "Миша, привет!"], 201);
    }

    public function store(Request $request)
    {
        //$user = User::create($request->all());

        return response()->json("123", 201);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return response()->json($user);
    }
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
