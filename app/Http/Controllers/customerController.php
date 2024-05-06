<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\productinformation;
use App\Models\orderinformation;
use App\Models\customerInformation;
use App\Models\maintenanceInformation;
use App\Models\smsAPI;


class customerController extends Controller
{
    public function dashboard(){
        //get the customer id fromt the session
        $customer_id = session('customer_id');
        //get the customer information from the database
        $customer = customerInformation::where('id', $customer_id)->first();
        //get the maintenance information from the database

        //select all products from the database
        $products = productinformation::all();
        return view('users.dashboard', compact('customer', 'products'));

    }
    public function corderbycustomer(){
        $orders = orderinformation::all();
        return view('users.order', compact('orders'));

    }
}
