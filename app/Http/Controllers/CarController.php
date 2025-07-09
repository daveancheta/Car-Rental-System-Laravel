<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
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
        return view('admin.create-car');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = request()->validate([
            'car_name' => ['required'],
            'car_price' => ['required'],
            'description' => ['required'],
            'image' => ['required', File::types(['png', 'jpg', 'webp'])],
            'status' => ['required'],
        ]);

        $imagePath = $request->file('image')->store('cars', 'public');

        $validated['image'] = $imagePath;

        $user = Cars::create($validated);

        return redirect('/create');
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
    public function edit(Cars $car) // Use singular form
    {
        return view('admin.create-car', compact('car')); // Use singular
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cars $car)
    {
        $validated = $request->validate([
            'car_name' => 'nullable',
            'car_price' => 'nullable',
            'description' => 'nullable',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->image->store('cars', 'public');
        }

        $car->update($validated);

        return redirect('/create')->with('success', 'Car updated successfully!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cars $car)
    {


        $car->delete();

        return redirect('/create');
    }

    public function fetchCarsAjax()
    {
        $cars = Cars::all(); // or add filters like where('status', 'available')
        return response()->json($cars);
    }
}
