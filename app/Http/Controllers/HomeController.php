<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdminService;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $adminService;
    public function __construct(AdminService $adminService)
    {
        $this->middleware(['auth','verified']);
        $this->adminService = $adminService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::User()->role === 'user'){
            return redirect('userHome');
        }
        $customer = $this->adminService->allCustomer();
        $rider = $this->adminService->allRider();
        $order = $this->adminService->allOrder();
        $transaction = $this->adminService->allTransaction();
        //return $transaction;
        return view('home', compact('customer','order','transaction','rider'));
    }

    public function customerList()
    {
        $customer = $this->adminService->customerList();
        return view('admin.customerList', compact('customer'));
    }

    public function totalTransaction()
    {
        $transaction = $this->adminService->allTransaction();
        $transactionDetail = $this->adminService->detailTransaction();
        return view('admin.totalTransaction', compact('transaction','transactionDetail'));
    }

    public function dateTransaction()
    {
        return view('admin.dateTransaction');
    }

    public function getDateTransaction(Request $request)
    {
        $request->validate([
            'from' => 'required',
            'to' => 'required'
        ]);
        Session::put('date', $request->all());
        $transactionDetail = $this->adminService->getDateTransaction($request->all());
        return view('admin.getDateTransaction', compact('transactionDetail'));
    }

    public function allOrder()
    {
        $order = $this->adminService->order();
        return view('admin.allOrder', compact('order'));
    }

    public function pendingOrder()
    {
        $order = $this->adminService->orderPending();
        return view('admin.pendingOrder', compact('order'));
    }

    public function enrouteOrder()
    {
        $order = $this->adminService->orderEnroute();
        return view('admin.enrouteOrder', compact('order'));
    }

    public function deliveredOrder()
    {
        $order = $this->adminService->orderDelivered();
        return view('admin.deliveredOrder', compact('order'));
    }

    public function addRider()
    {
        return view('admin.addRider');
    }

}
