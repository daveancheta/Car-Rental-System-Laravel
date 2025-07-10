<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class GetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('access-admin');

        $cars = Cars::latest()->simplePaginate(4); // fetch all users

        return view('admin.create-car', compact('cars'));
    }

    public function index2()
    {
        $cars = Cars::all(); // fetch all users
        $uniqueCode = 'CRN-' . now()->format('Ymd') . '-' . strtoupper(Str::random(8));

        return view('rent-car', compact('cars', 'uniqueCode'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function index3()
    {
        $userId = Auth::id(); // Get the currently logged-in user's ID

        $rents = Rent::where('customer_user_id', $userId)->get();

        return view('display-rent', compact('rents'));
    }

    public function user()
    {

         $rents = Rent::all(); // display all users

        // $true = 0;

        //  $is_admin = User::where('is_admin', $true)->get(); get by id hard coded

        return view('admin.users-display', compact('rents'));
    }
}
