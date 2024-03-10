<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RegistrationController extends Controller
{
    public function connect(Request $request)
    {
        $flag = false;
        $user = $request->input('name');
        if ($user == 'exampleUsername') $flag = true;
        //Запрос с приложения на соответствие данных вошедшего пользователя
        return response()->json(['hasUser' => $flag], 201);
    }

    public function store(Request $request, User $user)
    {
        Log::info('Received user data:', $request->all());
        $user->fill($request->all());
        $user->save();
        return response()->json(['hasUser' => true], 201);
    }

    public function destroy(Request $request, User $user)
    {
        //
    }
}
