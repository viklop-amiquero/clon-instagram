<?php

namespace App\Http\Controllers;

use Stringable;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request);
        // dd($request->get('username'));

        // Modificar el Request
        $request->request->add(['username' => Str::slug($request->username)]);

        // Validación
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users|min:3|max:30',
            // 'username' => 'required',
            'email' => 'required|unique:users|email|max:60',
            // 'email' => 'required|unique:users|email|max:60',
            // 'email' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Autenticar un usuario
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);

        // Otra manera de autenticar
        auth()->attempt($request->only('email', 'password'));

        // Redireccionar
        return redirect()->route('posts.index');
    }
}
