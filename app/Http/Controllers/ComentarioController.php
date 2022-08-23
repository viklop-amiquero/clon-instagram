<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    //
    public function store(Request $request, User $user, Post $post)
    {
        // dd('kelly ojitos');
        // Validar
        // dd(auth()->user()->id);
        $this->validate($request, [
            'comentario' => 'required|max:255'
        ]);

        // Almacenar
        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario
        ]);

        return back()->with('mensaje', 'comentario Realizado Correctamente');
    }
}
