<?php

namespace App\Services;

use DB;
use App\User;
use App\PricePerKM;
use Session;

class AuthService
{
    protected $user, $price;
    public function __construct(User $user, PricePerKM $price)
    {
        $this->user = $user;
        $this->price = $price;
    }

    public function checkPrice(array $credentials)
    {
        $origin = urlencode($credentials['pickup_address']);
        $destination = urlencode($credentials['delivery_address']);
        $api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=" . $origin . "&destinations=" . $destination . "&key=" . env('GOOGLE_MAP_API') . "&transit_mode=bus");
        $data = json_decode($api);
        $order['weight'] = $credentials['estimated_weight'];
        $order['pickup_address'] = $data->destination_addresses;
        $order['delivery_address'] = $data->origin_addresses;
        $order['distance'] = ((int)$data->rows[0]->elements[0]->distance->value / 1000);
        // GETTING THE PRICE FROM TABLE
        $price = $this->price->get('price')->first();
        $price = $price->price;
        // PUT THE WEIGHT AT 1 PER 5KG
        $wingsWeight = ceil($credentials['estimated_weight'] / 5);
        // GETTING THE AMOUNT
        $order['amount'] = $price * $wingsWeight * $order['distance'];
        if($order['amount'] < 1000){
            $order['amount'] = 1000;
        }
        Session::put('order', $order);
        return $order;
    }


}
