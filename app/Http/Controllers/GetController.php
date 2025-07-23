<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Rent;
use App\Models\User;
use App\Models\Messenger;
use App\Models\Room;
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

        $drivers = User::latest()
            ->where('is_driver', '=', '1')
            ->where('account_status', 'verified')
            ->get();


        return view('admin.create-car', compact('cars', 'drivers'));
    }

    public function index2()
    {

        $userId = Auth::id(); // Logged in user

        $user = Rent::latest()
            ->where('customer_user_id', $userId)
            ->wherein('status', ['pending', 'approved'])
            ->get();


        $cars = Cars::all(); // fetch all users
        $uniqueCode = 'CRN-' . now()->format('Ymd') . '-' . strtoupper(Str::random(8));





        return view('rent-car', compact('cars', 'uniqueCode', 'user'));
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

        return view('admin.display-rented', compact('rents'));
    }

    public function count()
    {

        // Get current month number (e.g., 07 for July)
        $currentMonthNumber = Carbon::now()->format('m');

        // Get current month name (e.g., July)
        $currentMonthName = Carbon::now()->format('F');

        $currentDate = Carbon::now();

        // $desiredMonthNumber = 6; // March
        // $monthFormatted = Carbon::create()->month($desiredMonthNumber)->format('m'); get the desired month of your choice


        $count1 = User::latest()
            ->where('is_admin', '=', '0')
            ->get()
            ->count();

        $count2 = Rent::latest()
            ->whereMonth('created_at', $currentMonthNumber)
            ->whereIn('status', ['approved', 'done'])
            ->get()
            ->count();
        // ->where('status', 'approved')
        // ->orWhere('status', 'done')
        // ->get()
        // ->count();

        $rents = Rent::latest()
            ->whereIn('status', ['approved', 'done'])
            ->get();

        $revenuecurrentmonth = Rent::latest()
            ->whereMonth('created_at', $currentMonthNumber)
            ->whereIn('status', ['approved', 'done'])
            ->get();

        $count3 = Cars::latest()
            ->whereIn('status', ['available'])
            ->get()
            ->count();

        $count4 = Cars::latest()
            ->get()
            ->count();

        $count5 = User::latest()
            ->where('is_driver', '=', '1')
            ->get()
            ->count();

        $count6 = User::latest()
            ->where('is_admin', '=', '1')
            ->get()
            ->count();

        $count7 = Rent::latest()
            ->where('status', 'approved')
            ->whereNotNull('driver')
            ->get()
            ->count();

        $lastMonth = Carbon::now()->subMonth();

        $count8 = Rent::latest()
            ->whereMonth('created_at', $lastMonth)
            ->get();

        $totalRevenue = Rent::all();




        return view('admin.dashboard', compact('count1', 'count2', 'count3', 'count4', 'count5', 'count6', 'count7', 'count8', 'rents', 'revenuecurrentmonth', 'totalRevenue'));
    }

    public function driver()
    {
        Gate::authorize('access-admin');

        $drivers = User::latest()
            ->where('is_driver', '=', '1')
            ->get();

        return view('admin.display-driver', compact('drivers'));
    }

    public function notifCount()
    {
        $driverId = Auth::id();

        $notifCount = Rent::where('driver', $driverId)
            ->where('notifStatus', Null)
            ->whereIn('status', ['approved', 'done'])
            ->get()
            ->count();

        return response()->json(['count' => $notifCount]);
    }

    public function notifications()
    {
        $driverId = Auth::id();

        $notification = Rent::latest()->where('driver', $driverId)
            ->whereIn('status', ['approved', 'done'])
            ->get();

        foreach ($notification as $notif) {
            $notif->time_ago = Carbon::parse($notif->created_at)->diffForHumans();
            $notif->start_date = Carbon::parse($notif->rent_start_date)->toFormattedDateString();
            $notif->end_date = Carbon::parse($notif->rent_end_date)->toFormattedDateString();

            $notif->fullname = trim("{$notif->customer_first_name} {$notif->middle_name} {$notif->customer_last_name} {$notif->suffixnull}");


            $notif->car_image = asset('storage/' . $notif->car_image);
        }

        return response()->json($notification);
    }
    public function manage(Request $request, Rent $rent)
    {
        return view('driver.manage-details', compact('rent'));
    }

    public function dashboarddriver()
    {

        $driverId = Auth::id();

        $currentMonthNumber = Carbon::now()->format('m');

        $lastMonth = Carbon::now()->subMonth();

        $driverRevenue = Rent::latest()
            ->where('driver', $driverId)
            ->whereIn('status', ['approved', 'done'])
            ->get();

        $dRCurrentMonth = Rent::latest()
            ->where('driver', $driverId)
            ->WhereMonth('created_at', $currentMonthNumber)
            ->whereIn('status', ['approved', 'done'])
            ->get();

        $dRPastMonth = Rent::latest()
            ->where('driver', $driverId)
            ->WhereMonth('created_at', $lastMonth)
            ->whereIn('status', ['approved', 'done'])
            ->get();

        return view('driver.dashboard', compact('driverRevenue', 'dRCurrentMonth', 'dRPastMonth'));
    }

    public function driverMessenger()
    {

        return view('driver.messenger');
    }

    public function getMessage()
    {
        $driverId = Auth::id();

        $userMessage = Room::where('driver_id', $driverId)
            ->get();

        foreach ($userMessage as $u) {
            $u->profile = asset('storage/' . $u->customer_profile);
        }

        return response()->json($userMessage);
    }

    public function getSession(Room $room)
    {

        return view('driver.chat-session', compact('room'));
    }

    public function getDriverSessionMessage(Request $request, Room $room)
    {

        $driverId = Auth::id();
      
        $driverMessage = Messenger::oldest()->where('room_id', $room->id)
          
            ->get();

        foreach ($driverMessage as $u) {
            $u->profile = asset('storage/' . $u->customer_profile);
        }

     return response()->json($driverMessage);
     
    }

    public function getCustomerSessionMessage(Room $room)
    {
        $customerId = $room->user_id;


        $driverMessage = Messenger::where('user_id', $customerId)
            ->get();

        foreach ($driverMessage as $u) {
            $u->profile = asset('storage/' . $u->customer_profile);
        }

        return response()->json($driverMessage);
    }

    public function userMessenger() 
    {
        return view('user-messenger');
    }

    public function getuserMessage() 
    {
          $customerId = Auth::id();

        $userMessage = Room::where('user_id', $customerId);

        foreach ($userMessage as $u) 
        {
            $u->profile = asset('storage/' . $u->customer_profile);
        }

        return response()->json('userMessage');
    }
}
