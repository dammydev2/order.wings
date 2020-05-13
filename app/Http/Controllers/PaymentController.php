<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paystack;
use App\Order;
use App\Payment;
use Session;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        // GETTING THE ORDER ID
        $getID = Order::orderBy('id', 'desc')->first();
        if ($getID === NULL) {
            $lastID = 0;
        } else {
            $lastID = $getID->id;
        }
        $newID = $lastID + 1;
        $date = date('ymds');
        $orderID = 'WG' . $date . $newID;
        Session::forget('order');
        Payment::create([
            'name' => \Auth::User()->first_name . ' ' . \Auth::User()->last_name,
            'orderID' => $orderID,
            'customer_id' => \Auth::User()->id,
            'amount' => $paymentDetails['data']['metadata']['amount'],
            'reference_code' => $paymentDetails['data']['reference']
        ]);
        $details['orderID'] = $orderID;
        $details['amount'] = $paymentDetails['data']['metadata']['amount'];
        $details['pickup_address'] = $paymentDetails['data']['metadata']['pickup_address'];
        $details['delivery_address'] = $paymentDetails['data']['metadata']['delivery_address'];
        $details['weight'] = $paymentDetails['data']['metadata']['weight'];
        $details['distance'] = $paymentDetails['data']['metadata']['distance'];
        Session::put('details', $details);
        return redirect('addOrderDetails');
        //dd($paymentDetails);

        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
