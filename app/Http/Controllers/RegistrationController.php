<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function connect()
    {
        //Запрос с приложения на соответствие данных вошедшего пользователя
        return response()->json(['hasUser' => true], 201);
    }

    public function store(Request $request, User $user)
    {
        //
    }

    public function destroy(Request $request, User $user)
    {
        //
    }
}
