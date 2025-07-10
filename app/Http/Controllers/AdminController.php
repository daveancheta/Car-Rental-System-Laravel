<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        return redirect('/create');
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

        return view('admin.edit-user', compact('rent'));
    }

    public function update(Request $request, Rent $rent)
    {
        $validated = $request->validate([
            'first_name' => 'nullable',
            'middle_name' => 'nullable',
            'last_name' => 'nullable',
            'suffix' => 'nullable',
            'password' => 'nullable',
            'region' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable',
            'city' => 'nullable',
            'barangay' => 'nullable',
            'account_status' => 'nullable',
            'verification_code' => 'nullable',
            'additional_address' => 'nullable',
            'profile' => 'nullable|image|mimes:jpg,jpeg,png,web',
            'valid_id_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp'
        ]);

        if ($request->hasFile('valid_id_photo')) {
            $validated['valid_id_photo'] = $request->valid_id_photo->store('valid_id', 'public');
        }

        if ($request->hasFile('profile')) {
            $validated['profile'] = $request->profile->store('profile', 'public');
        }

        $rent->update($validated);

        return redirect('/verification_code');
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
