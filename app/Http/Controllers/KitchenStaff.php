<?php

namespace App\Http\Controllers;
use App\Models\productinformation;
use App\Models\orderinformation;
use App\Models\customerInformation;
use App\Models\maintenanceInformation;
use App\Models\checkout;
use App\Models\SystemUser;
use Humans\Semaphore\Laravel\Facades\Semaphore;
use App\Models\checkoutitem;
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
        $totalSales = checkout::where('status', 'Delivered')->whereDate('created_at', date('Y-m-d'))->sum('Total');

        //sum the Total from checkout where status is Done and created month at is today
        $totalSalesMonth = checkout::where('status','Delivered')->whereMonth('created_at', date('m'))->sum('Total');


        $orders = Checkout::join('system_users', 'checkout.customerID', '=', 'system_users.id')
            ->where('checkout.status', '!=', 'Done')
            ->orderBy('checkout.created_at', 'DESC')
            ->select('checkout.*', 'system_users.*', 'checkout.id as IDorder')
            ->get();
       

        return view('kitchenstaff.dashboard', compact('total', 'totalSales', 'totalSalesMonth', 'orders'));
    }
    public function vieworder($id){
        

        
        // Fetch the order details from the database
        $checkout = checkout::where('id', $id)->first();
        $myorderdetails = checkoutitem::select('orderitem.*', 'productinformations.*')
            ->join('productinformations', 'productinformations.id', '=', 'orderitem.productID')
            ->where('orderID', $id)
            ->get();
        
            return response()->json($myorderdetails);
        
      

    }
    public function updateorder($id){
        //update the status of the order
        $update = checkout::where('id', $id)->update(['status' => 'Processing']);
        return response()->json('success');
    }
    public function UpdateOrderK(Request $request){
        //update the status of the order
        $stat = $request->status;
        $id = $request->orderid;
        $orderid = $request->ordersid;
        $update = checkout::where('id', $id)->update(['status' => $stat]);
        $userid = checkout::where('id', $id)->first();
        $userid = $userid->customerID;
        
        $user = SystemUser::where('id', $userid)->first();
        $usernumber = $user->PhoneNumber;
        //send the sms to the customer
        Semaphore::message()->send(
            $usernumber,
            'Your Order '.$orderid.' is now '.$stat
            
        );
        //get
       //back with a message
        return back()->with('success', 'Order Updated');
    }
}
