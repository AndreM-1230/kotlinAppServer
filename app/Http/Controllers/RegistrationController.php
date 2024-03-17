<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegistrationController extends Controller
{

    public function hasUser(Request $request)
    {
        Log::info('RegistrationController.hasUser.request:', $request->all());
        $email = $request->get('email');
        $password = $request->get('password');
        $user = User::where('email', $email)->where('password', $password)->first();
        $flag = (bool)$user;
        if ($user) Log::info('RegistrationController.hasUser.response:', (array)$user);
        else Log::info('RegistrationController.hasUser.response: user does non exist');
        return response()->json(['hasUser' => $flag], 201);
    }

    public function connect(Request $request)
    {
        Log::info('RegistrationController-connect:', $request->all());
        $flag = false;
        $user = $request->input('name');
        if ($user == 'exampleUsername') $flag = true;
        //Запрос с приложения на соответствие данных вошедшего пользователя
        return response()->json(['hasUser' => $flag], 201);
    }

    public function send(Request $request)
    {
        Log::info('RegistrationController.send.request:', $request->all());
        $email = $request->get('email');
        $password = $request->get('password');

        // Поиск пользователя по логину и паролю
        $user = User::where('email', $email)->where('password', $password)->first();

        // Отправка ответа
        if ($user) {
            // Пользователь найден
            Log::info('RegistrationController.send.response:', (array)$user);
            return response()->json($user, 201);
        } else {
            // Пользователь не найден
            Log::info('RegistrationController.send.response: user does non exist');
            return response()->json(['error' => false], 404);
        }
    }

    public function store(Request $request, User $user)
    {
        Log::info('RegistrationController.store.request:', $request->all());
        $user->fill(array_merge($request->all(), ['login' => $request->get('email'), 'name' => $request->get('email')]));
        $user->save();
        if ($user) {
            Log::info('RegistrationController.store.response:', (array)$user);
            return response()->json($user, 201);
        } else {
            Log::info('RegistrationController.store.response: user does non exist');
            return response()->json(['error' => false], 404);
        }
    }

    public function destroy(Request $request, User $user)
    {
        //
    }
}
