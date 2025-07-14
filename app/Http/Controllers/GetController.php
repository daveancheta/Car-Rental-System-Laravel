<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Carbon\Carbon;


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

        Gate::authorize('access-admin');

        $rents = Rent::all(); // display all users

        // $true = 0;

        //  $is_admin = User::where('is_admin', $true)->get(); get by id hard coded

        return view('admin.users-display', compact('rents'));
    }

    public function count()
    {

        // Get current month number (e.g., 07 for July)
        $currentMonthNumber = Carbon::now()->format('m');

        // Get current month name (e.g., July)
        $currentMonthName = Carbon::now()->format('F');

        // $desiredMonthNumber = 6; // March
        // $monthFormatted = Carbon::create()->month($desiredMonthNumber)->format('m'); get the desired month of your choice


        $count1 = User::all()->count();
        $count2 = Rent::all()->count();
        $rents = Rent::all();

        $revenuecurrentmonth = Rent::oldest()
            ->whereMonth('created_at', $currentMonthNumber)
            ->get();

        return view('admin.dashboard', compact('count1', 'count2', 'rents', 'revenuecurrentmonth'));
    }
}
