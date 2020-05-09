<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;
use Session;

class OrderController extends Controller
{

    protected $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function checkAmount(Request $request)
    {
        $request->validate([
            'pickup_address' => 'required|string',
            'delivery_address' => 'required|string',
            'estimated_weight' => 'required|numeric'
        ]);
        $this->authService->checkPrice($request->all());
        return redirect('details');
    }

    public function details()
    {
        //return $pickup_address = Session::get('order')['pickup_address'][0];
        $order = Session::get('order');
        return view('details', compact('order'));
    }

    public function signin()
    {
        return view('signin');
    }


}
