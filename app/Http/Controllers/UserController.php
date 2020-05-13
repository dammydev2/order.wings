<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Services\AuthService;

class UserController extends Controller
{
    protected $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function userHome()
    {
        return view('user.userHome');
    }

    public function makePayment()
    {
        return view('user.makePayment');
    }

    public function addOrderDetails()
    {
        $details =  Session::get('details');
        return view('user.addOrderDetails', compact('details'));
    }

    public function enterDetails(Request $request)
    {
        $request->validate([
            'pickup_address' => ['required', 'string'],
            'delivery_address' => ['required', 'string'],
            'weight' => ['required', 'string'],
            'orderID' => ['required', 'string'],
            'receiver_name' => ['required', 'string'],
            'receiver_phone' => ['required', 'string', 'min:11'],
            'item' => ['required', 'string'],
            'quantity' => ['required', 'integer'],
        ]);
        $details = $this->authService->orderDetails($request->all());
        Session::flash('message', 'Details added successfully');
        return redirect('userHome');
    }

    public function orderHistory()
    {
        $userID = \Auth::User()->id;
        $userHistory = $this->authService->getOrderHistory($userID);
        //return $userHistory;
        return view('user.orderHistory', compact('userHistory'));
    }

    public function userTransactionHistory()
    {
        $userID = \Auth::User()->id;
        $paymentData = $this->authService->getUserTransactionHistory($userID);
        return view('user.paymentHistory', compact('paymentData'));
    }


}
