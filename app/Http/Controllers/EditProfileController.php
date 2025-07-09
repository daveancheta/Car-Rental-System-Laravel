<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EditProfileController extends Controller
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
    public function store(Request $request)
    {
        //
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
      public function edit(User $user) 
    {
        return view('edit_profile', compact('user')); 
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'suffix' => 'nullable',
            'region' => 'required',
            'city' => 'required',
            'barangay' => 'required',
            'additional_address' => 'required',
            'profile' => '|image|mimes:jpg,jpeg,png,webp',
            'valid_id_photo' => '|image|mimes:jpg,jpeg,png,webp',
        ]);

         if ($request->hasFile('valid_id_photo')) {
            $validated['valid_id_photo'] = $request->valid_id_photo->store('valid_id', 'public');
        }


        if ($request->hasFile('profile')) {
            $validated['profile'] = $request->profile->store('profile', 'public');
        }

        $user->update($validated);

        return redirect('/profile')->with('success', 'Profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
