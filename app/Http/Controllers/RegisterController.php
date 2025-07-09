<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store()
    {
        $validatedAttributes = request()->validate([
            'first_name' => ['required'],
            'middle_name' => ['nullable'],
            'last_name' => ['required'],
            'suffix' => ['nullable'],
            'region' => ['nullable'],
            'city' => ['nullable'],
            'barangay' => ['nullable'],
            'additional_address' => ['nullable'],
            'valid_id_photo' => ['nullable'],
            'email' => ['required', 'max:254', 'email'],
            'phone' => ['required'],
            'profile' => ['nullable'],
            'password' => ['required', Password::min(6), 'confirmed'],
            'account_status' => ['nullable']
        ]);

        $user = User::create($validatedAttributes);

        Auth::login($user);

        return redirect('/');
    }

    public function edit()
    {
        $user = Auth::user();
        $uniqueCode = mt_rand(100000, 999999);

        return view('verification', compact('user', 'uniqueCode'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'region' => 'required',
            'city' => 'required',
            'barangay' => 'required',
            'account_status' => 'nullable',
            'verification_code' => 'required',
            'additional_address' => 'required',
            'profile' => 'nullable|image|mimes:jpg,jpeg,png,web',
            'valid_id_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp'
        ],  [
            'region.required' => 'Please select a region.',
            'city.required' => 'City is required.',
            'barangay.required' => 'Barangay is required.',
            'additional_address.required' => 'Please enter your house number and street.',
        ]);

        if ($request->hasFile('valid_id_photo')) {
            $validated['valid_id_photo'] = $request->valid_id_photo->store('valid_id', 'public');
        }


        if ($request->hasFile('profile')) {
            $validated['profile'] = $request->profile->store('profile', 'public');
        }

        $user->update($validated);

        $user = Auth::user();

        Mail::to($user->email)
            ->send(new VerificationMail());

        return redirect('/verification_code');
    }

 

    public function code(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'verification_code' => 'required'
        ]);

        // Find user with matching email and verification code
        $user = User::where('email', $request->email)
            ->where('verification_code', $request->verification_code)
            ->first();

        if (!$user) {
            return back()->withErrors(['verification_code' => 'Invalid email or verification code.']);
        }

        // Optional: update account_status or mark verified
        $user->account_status = 'verified';
        $user->save();

        // Regenerate session to prevent session fixation attacks
        $request->session()->regenerate();

        return redirect('/profile')->with('success', 'Email verified and logged in!');
    }
}
