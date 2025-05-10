<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function create()
   {
       return view('add-user'); // Возвращаем Blade-шаблон
   }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'surname' => 'nullable|string|max:50',
            'email' => 'required|email|unique:users,email',
        ]);

        User::create($validated);

        return redirect('/user')->with('success', 'Пользователь добавлен');
    }

    public function index()
    {
        return response()->json(User::all());
    }

    public function get($id)
    {
        $user = User::find($id);
        return $user ? response()->json($user) : response()->json(['error' => 'Пользователь не найден'], 404);
    }
}
