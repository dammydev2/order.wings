<?php

namespace App\Services;

use DB;
use App\User;
use App\PricePerKM;
use App\Order;
use App\Payment;
use Session;

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

}