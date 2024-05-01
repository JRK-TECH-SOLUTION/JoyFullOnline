<?php

namespace App\Http\Controllers;
use App\Models\productinformation;
use App\Models\orderinformation;
use App\Models\customerInformation;
use App\Models\maintenanceInformation;
use Illuminate\Http\Request;

class KitchenStaff extends Controller
{
    public function dashboard(){
        return view('kitchenstaff.dashboard');
    }
    public function order(){
         //select all data from the orderinformation table inner join by customerInformation table
         $orders = orderinformation::join('customerInformation', 'orderinformation.customer_id', '=', 'customerInformation.id');
         return view('kitchenstaff.order', compact('orders'));
    }
}
