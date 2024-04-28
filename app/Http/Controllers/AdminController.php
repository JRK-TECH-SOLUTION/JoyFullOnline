<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\SystemUser;
use App\Models\productinformation;
use App\Models\smsAPI;

use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard(){
        return view('administrator.dashboard');
    }
    public function SystemUser(){
        $systemusers = SystemUser::all();
        return view('administrator.systemuser', compact('systemusers'));

    }
    public function addUser(Request $request){
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:system_users,email',
            'phone_number' => 'required|string|min:11|max:11|unique:system_users,phone_number',
            'role' => 'required|string|max:255',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());

        }

        // Generate a random password with 8 characters
        $password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8);
        $password = Hash::make($password);

        try {
            // Create a new SystemUser instance and save it to the database
            $systemuser = new SystemUser;
            $systemuser->name = $request->name;
            $systemuser->email = $request->email;
            $systemuser->phone_number = $request->phone_number;
            $systemuser->role = $request->role;
            $systemuser->password = $password;
            $systemuser->save();

            // Redirect back with success message
            return redirect()->back()->with('success', 'User added successfully');
        } catch (\Exception $e) {
            // Log the exception for debugging purposes
            Log::error($e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', 'An error occurred while adding the user. Please try again later.');
        }

    }
    public function deleteUser($id){
        $systemuser = SystemUser::find($id);
        $systemuser->delete();

        return redirect()->back()->with('success', 'User deleted successfully');


    }

    public function product(){
        $products = productinformation::all();
        return view('administrator.product', compact('products'));
    }
    public function addProduct(Request $request){


        $validator = Validator::make($request->all(), [
            'productname' => 'required|string|max:255',
            'productdescription' => 'required|string|max:255',
            'productprice' => 'required|numeric',
            'productquantity' => 'required|numeric',
            'productcategory' => 'required|string|max:255',
            'productstatus' => 'required|string|max:255',



        ]);
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());

        }


        try{
        $product = new productinformation;
            $product->productname = $request->productname;
            $product->productdescription = $request->productdescription;
            $product->productprice = $request->productprice;
            $product->productquantity = $request->productquantity;
            $product->productcategory = $request->productcategory;
            $product->productstatus = $request->productstatus;
            $product->productimage = "";
            $product->save();

            // Redirect back with success message
            return redirect()->back()->with('success', 'Product added successfully');



        } catch (\Exception $e) {
            // Log the exception for debugging purposes
            Log::error($e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', $e->getMessage());
        }


    }

    public function smsApi(){

        //select all data from the smsapi table
        $smsapi = smsAPI::all();
        return view('administrator.sms', compact('smsapi'));
    }

    public function updateSMS(Request $request){
        $validator = Validator::make($request->all(), [
            'api_key' => 'required|string|max:255',
            'sender_name' => 'required|string|max:255',
            'link' => 'required|string|max:255',
        ]);
         // Check if validation fails
         if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());

        }


        // Update the smsapi table with the new data
        $smsapi = smsAPI::find(1);
        $smsapi->api_key = $request->api_key;
        $smsapi->sender_name = $request->sender_name;
        $smsapi->link = $request->link;
        $smsapi->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'SMS API updated successfully');

    }
}
