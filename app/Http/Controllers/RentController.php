<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RentMail;
use Illuminate\Support\Str;

class RentController extends Controller
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
        return view('rent-car');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = request()->validate([
            'crn_id' => ['required'],
            'customer_user_id' => ['required'],
            'customer_first_name' => ['required'],
            'customer_middle_name' => ['nullable'],
            'customer_last_name' => ['required'],
            'customer_suffix' => ['nullable'],
            'customer_region' => ['nullable'],
            'customer_city' => ['nullable'],
            'customer_barangay' => ['nullable'],
            'customer_additional_address' => ['nullable'],
            'customer_valid_id_photo' => ['nullable'],
            'customer_profile' => ['nullable'],
            'customer_email' => ['required'],
            'customer_phone' => ['required'],
            'rent_start_date' => ['required'],
            'rent_end_date' => ['required'],
            'car_id' => ['required'],
            'car_name' => ['required'],
            'car_price' => ['required'],
            'car_image' => ['required'],
            'driver' => ['nullable'],
            'status' => ['required'],
        ]);

        $rents = Rent::create($validated);

        $carId = $request->input('car_id');
        $car = Cars::find($carId);
        $car->update(['status' => 'rented']);

        $user = Auth::user();
        Mail::to($user->email)
            ->send(new RentMail($rents));


        return redirect('/car');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rent $rent) {}

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

    public function destroy(Rent $rent)
    {
        if ($rent->car_id) {
            $car = Cars::find($rent->car_id);
            if ($car) {
                $car->update(['status' => 'available']);
            }
        }

        $rent->delete();

        return redirect('/display');
    }



    /**
     * Remove the specified resource from storage.
     */
}
