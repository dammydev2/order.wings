<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userHome()
    {
        return view('user.userHome');
    }

    public function makePayment()
    {
        return view('user.makePayment');
    }


}
