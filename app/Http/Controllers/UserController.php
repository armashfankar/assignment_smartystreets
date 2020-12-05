<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * This function renders user signup page.
     * 
     * Signup form consists of 9 fields
     * name, email, password, password_confirmation
     * phone, street address, city, state, zip
     * 
    */
    public function signup()
    {
        return view('signup');
    }


    /**
     * This function renders user login page.
     * 
     * Login form consists of 2 fields
     * email & password
     * 
    */
    public function login()
    {
        return view('login');
    }
}
