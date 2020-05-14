<?php

namespace App\Services;

use DB;
use App\User;
use App\PricePerKM;
use App\Order;
use App\Payment;
use Session;
use Illuminate\Support\Facades\Hash;

class AdminService
{
    protected $user, $price, $order, $payment;
    public function __construct(User $user, PricePerKM $price, Order $order, Payment $payment)
    {
        $this->user = $user;
        $this->price = $price;
        $this->order = $order;
        $this->payment = $payment;
    }

    public function allCustomer()
    {
        return $this->user->where('role', 'user')->get();
    }

    public function allRider()
    {
        return $this->user->where('role', 'rider')->get();
    }

    public function allTransaction()
    {
        return $this->payment->sum('amount');
    }

    public function allOrder()
    {
        return $this->order->all();
    }

    public function customerList()
    {
        return $this->user->where('role', 'user')->orderBy('id','desc')->paginate(30);
    }

    public function detailTransaction()
    {
        return $this->payment->orderBy('id','desc')->paginate(50);
    }

    public function getDateTransaction(array $credentials)
    {
        $from = $credentials['from'].' 00:00:00';
        $to = $credentials['to']. ' 23:59:59';
        return $this->payment->where('created_at', '>=', $from)
        ->where('created_at', '<=', $to)
        ->orderBy('id','desc')->get();
    }

    public function order()
    {
        return $this->order->orderBy('id', 'desc')->paginate(30);
    }

    public function orderPending()
    {
        return $this->order->where('status', 'pending')->orderBy('id', 'desc')->paginate(30);
    }

    public function orderEnroute()
    {
        return $this->order->where('status', 'transit')->orderBy('id', 'desc')->paginate(30);
    }

    public function orderDelivered()
    {
        return $this->order->where('status', 'delivered')->orderBy('id', 'desc')->paginate(30);
    }

    public function riderList()
    {
        return $this->user->where('role', 'rider')->orderBy('id', 'desc')->paginate(10);
    }

    public function enterRider(array $data)
    {
        User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'rider',
        ]);
    }

    public function riderDetails($riderID)
    {
        return $this->user->where('id', $riderID)->first();
    }

    public function riderPendingOrder($riderID)
    {
        return $this->order->where('status', 'pending')->where('riderID', $riderID)->orderBy('id', 'desc')->get();
    }

    public function riderTransitOrder($riderID)
    {
        return $this->order->where('status', 'transit')->where('riderID', $riderID)->orderBy('id', 'desc')->get();
    }

    public function riderDeliveredOrder($riderID)
    {
        return $this->order->where('status', 'delivered')->where('riderID', $riderID)->orderBy('id', 'desc')->get();
    }

}