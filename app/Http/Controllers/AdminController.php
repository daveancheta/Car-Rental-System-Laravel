<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
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
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (! Auth::attempt($validatedAttributes)) {
            throw ValidationException::withMessages([
                'user' => 'Sorry, those credentials do not match.'
            ]);
        }

        request()->session()->regenerate();

        return redirect('/admindashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rent $rent)
    {
        Gate::authorize('access-admin');

        return view('admin.edit-rented', compact('rent'));
    }

    public function update(Request $request, Rent $rent)
    {

        Gate::authorize('access-admin');

        $validated = $request->validate([
            'status' => 'required'
        ]);

        $rent->update($validated);

        return redirect('/rented/' . $rent->id . '/admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        Auth::logout();

        return redirect('loginadmin');
    }
}
