<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'status' => ['required'],
        ]);

        $user = Rent::create($validated);

        $carId = $request->input('car_id');
        $car = Cars::find($carId);
        $car->update(['status' => 'rented']);


        return redirect('/car');
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
}
