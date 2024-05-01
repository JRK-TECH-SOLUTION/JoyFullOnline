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
        //select all products from the database
        $products = productinformation::all();
        return view('users.dashboard', compact('products'));
    }
    public function corderbycustomer(){
        $orders = orderinformation::all();
        return view('users.order', compact('orders'));

    }
}
