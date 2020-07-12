<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class ActivationController extends Controller
{

    public function show(Request $request, User $user)
    {
        if (!$request->hasValidSignature()) return response('Token Inválido', 401);

        if ($user->email_verified_at) return response('Esta cuenta ya está activada', 500);

        return view('auth.activate', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|confirmed|min:4'
        ]);

        $user->password = bcrypt($request->get('password'));
        $user->email_verified_at = now();

        $user->save();

        Auth::login($user);

        return redirect()->route('home');
    }
}
