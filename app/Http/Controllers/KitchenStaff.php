<?php

namespace App\Http\Controllers;
use App\Models\productinformation;
use App\Models\orderinformation;
use App\Models\customerInformation;
use App\Models\maintenanceInformation;
use App\Models\checkout;
use App\Models\SystemUser;
use Illuminate\Http\Request;

date_default_timezone_set('Asia/Manila');

class KitchenStaff extends Controller
{
    public function dashboard(){
        //count the total ID in  checkout where status is Pending and Approved
        $pending = checkout::where('status', 'Pending')->count();
        $approved = checkout::where('status', 'Approved')->count();
        $total = $pending + $approved;
    //set the time zone
       
        //sum the Total from checkout where status is Done and created at is today
        $totalSales = checkout::where('status', 'Done')->whereDate('created_at', date('Y-m-d'))->sum('total');

        //sum the Total from checkout where status is Done and created month at is today
        $totalSalesMonth = checkout::where('status', 'Done')->whereMonth('created_at', date('m'))->sum('total');


        //select all the data from checkout innerjoin by SystemUser Order by created_at Desc where status is not equal Done
        $orders = checkout::join('system_users', 'checkout.customerID', '=', 'system_users.id')->where('checkout.status', '!=', 'Done')->orderBy('checkout.created_at', 'DESC')->get();
       

        return view('kitchenstaff.dashboard', compact('total', 'totalSales', 'totalSalesMonth', 'orders'));
    }

}
