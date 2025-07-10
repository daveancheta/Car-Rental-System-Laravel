<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function password ()
    {
        return view('change_password');
    }
    public function login() 
    {
        return view('admin.login');
    }
}
