<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $validatedAttributes = request()->validate([
            'email_driver' => ['required'],
            'password' => ['required']
        ]);

        if (! Auth::attempt($validatedAttributes)) {
            throw ValidationException::withMessages([
                'email_driver' => 'Sorry, those credentials do not match.'
            ]);
        }

        request()->session()->regenerate();

        return redirect('/driverhomes');
    }

      public function register(Request $request)
    {
        $validated = request()->validate([
            'first_name' => ['required'],
            'middle_name' => ['nullable'],
            'last_name' => ['required'],
            'suffix' => ['nullable'],
            'email_driver' => ['required', 'max:254', 'email'],
            'phone' => ['required'],
            'profile' => ['nullable'],
            'password' => ['required', Password::min(6), 'confirmed'],
            'account_status' => ['nullable'],
            'is_driver' => ['nullable'],
            'valid_id_photo' => ['nullable'],
        ]);

           if ($request->hasFile('valid_id_photo')) {
            $validated['valid_id_photo'] = $request->valid_id_photo->store('valid_id', 'public');
        }

          if ($request->hasFile('profile')) {
            $validated['profile'] = $request->valid_id_photo->store('profile', 'public');
        }

        $user = User::create($validated);

        Auth::login($user);

        return redirect('/driverhomes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Auth::logout();

        return redirect('/driver');
    }
}
