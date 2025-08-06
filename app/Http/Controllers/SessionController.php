<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class Sessioncontroller extends Controller
{
    public function index() {
        return view('index');
    }
    public function create() {
        return view('login');
    }
    public function store() {
        
        $validatedAttributes = request()->validate([
        'email' => ['required', 'max:254', 'email'],
        'password' => ['required', Password::min(6)]
    ]);
    
    if (! Auth::attempt($validatedAttributes)) {
        throw ValidationException::withMessages([
            'email' => 'Sorry, those credentials do not match.'
        ]);
    }

    $userId = Auth::id();
    
    request()->session()->regenerate();
    User::where('id', $userId)->update(['last_login' => Carbon::now()]);

    return redirect('/index');
    }
    public function destroy() {
        Auth::logout();

        return redirect('/index');
    }
}