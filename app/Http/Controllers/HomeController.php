<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }
    public function services()
    {
        return view('services');
    }
    public function cars()
    {
        return view('rent-car');
    }
    public function profile()
    {
        return view('profile');
    }
    public function verify()
    {
        return view('verification');
    }

    public function display_rent()
    {
        return view('display-rent');
    }
    public function VerificationCode()
    {
        return view('verification_code');
    }
    public function password()
    {
        return view('change_password');
    }
    public function login()
    {
        return view('admin.login');
    }
    public function driverhome() 
    {
        Gate::authorize('access-driver');
        return view('driver.index');
        
    }

       public function driverlogin() 
    {
      
        return view('driver.login');
        
    }

    public function rbac () 
    {
        return view('rbac');
    }

    public function registerasdriver ()
    {
        return view('driver.register');
    }
    public function notification() {
        return view('driver.notification');
    }


}
