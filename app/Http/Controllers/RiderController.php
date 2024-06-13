<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productinformation;
use App\Models\orderinformation;
use App\Models\customerInformation;
use App\Models\maintenanceInformation;
use App\Models\checkout;
use App\Models\SystemUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Humans\Semaphore\Laravel\Facades\Semaphore;
use App\Models\checkoutitem;

class RiderController extends Controller
{
    public function riderdashboard()
    {
        //select * FROM checkout where RiderId is equal Auth::user()->id inner join checkoutitem where checkout.id = checkoutitem.checkoutid and customerInformation.id = checkout.customerid
        $orders = Checkout::join('system_users', 'checkout.customerID', '=', 'system_users.id')
        ->where('checkout.riderID', Auth::user()->id)
        ->where('checkout.status', '!=', 'Delivered')
        ->orderBy('checkout.created_at', 'DESC')
        ->select('checkout.*', 'system_users.*', 'checkout.id as IDorder')
        ->get();

        return view('rider.dashboard', compact('orders'));
     
    }
    public function vieworder($id){
        $checkout = checkout::where('id', $id)->first();
        $myorderdetails = checkoutitem::select('orderitem.*', 'productinformations.*')
            ->join('productinformations', 'productinformations.id', '=', 'orderitem.productID')
            ->where('orderID', $id)
            ->get();
        
            return response()->json($myorderdetails);
    }
    public function UpdateOrderK(Request $request){
        //update the status of the order
        $stat = $request->status;
        $id = $request->orderid;
        $rider = $request->rider;
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
    public function profile(){
        //get the profile of the user
        $profile= SystemUser::where('id', auth()->user()->id)->first();
        return view('rider.profile', compact('profile'));
    }
    public function changePassword(Request $request){
        $oldpassword = $request->oldpassword;
        $NewPassword = $request->NewPassword;
        $ConfirmPassword = $request->ConfirmPassword;
        $id = auth()->user()->id;
        $profile = SystemUser::find($id);
        if (Hash::check($oldpassword, $profile->Password)) {
            if ($NewPassword == $ConfirmPassword) {
                $profile->Password = Hash::make($NewPassword);
                $profile->save();
                return redirect()->back()->with('success', 'Password Changed Successfully');
            } else {
                return redirect()->back()->with('error', 'New Password and Confirm Password does not match');
            }
        } else {
            return redirect()->back()->with('error', 'Old Password is incorrect');
        }
    


    }
    public function updateProfile(Request $request){
        $id = auth()->user()->id;
        $profile = SystemUser::find($id);
        $profile->FullName = $request->FullName;
        $profile->Email = $request->Email;
        $profile->PhoneNumber = $request->PhoneNumber;
        $profile->Address = $request->Address;
        $profile->save();
        return redirect()->back()->with('success', 'Profile Updated Successfully');

    }
    public function updateimage(Request $request){
        $id = auth()->user()->id;
        $profile_photo_path = $request->file('profile_photo_path');
        $oldphoto = $request->oldphoto;
        //save the new photo in public/upload and update the database
        $fileName = uniqid() . '.' . $profile_photo_path->getClientOriginalExtension();
        $profile_photo_path->storeAs('', $fileName, 'public_upload');
        $publicUrl = asset($fileName);
        $profile = SystemUser::find($id);
        $profile->profile_photo_path = $publicUrl;
        $profile->save();
        return redirect()->back()->with('success', 'Profile Image Updated Successfully');


    }
        
      
}
