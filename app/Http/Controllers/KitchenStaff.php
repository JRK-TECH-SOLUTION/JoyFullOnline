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

        //select * from system_user where role ='Rider
        $rider = SystemUser::where('role', 'Rider')->get();


        return view('kitchenstaff.dashboard', compact('total', 'totalSales', 'totalSalesMonth', 'orders', 'rider'));
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
        $rider = $request->rider;
        $orderid = $request->ordersid;
        $update = checkout::where('id', $id)->update(['status' => $stat, 'riderID' => $rider]);
        $userid = checkout::where('id', $id)->first();
        $userid = $userid->customerID;
        if($stat == 'Accepted'){
            //get all the items in the order
            $myorderdetails = checkoutitem::select('orderitem.*', 'productinformations.*')
                ->join('productinformations', 'productinformations.id', '=', 'orderitem.productID')
                ->where('orderID', $id)
                ->get();
            //update the quantity of the product

            foreach($myorderdetails as $order){
                $product = productinformation::where('id', $order->productID)->first();
                $quantity = $product->productquantity - $order->quantity;
                productinformation::where('id', $order->productID)->update(['productquantity' => $quantity]);
            }


        }

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
        return view('kitchenstaff.profile', compact('profile'));
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
