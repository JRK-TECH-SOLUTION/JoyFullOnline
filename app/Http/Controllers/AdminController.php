<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\SystemUser;
use App\Models\productinformation;
use App\Models\orderinformation;
use App\Models\customerInformation;
use App\Models\maintenanceInformation;
use App\Models\smsAPI;
use Humans\Semaphore\Laravel\Facades\Semaphore;

use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard(){
        return view('administrator.dashboard');
    }
    public function SystemUser(){
        $systemusers = SystemUser::where('role', '!=', 'User')->where('role', '!=', 'Rider')->get();
        return view('administrator.systemuser', compact('systemusers'));

    }
    public function addUser(Request $request){
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:system_users,email',
            'phone_number' => 'required|string|min:11|max:11|unique:system_users,PhoneNumber',
            'role' => 'required|string|max:255',
            'Address' => 'required|string|max:255',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());

        }

        // Generate a random password with 8 characters
        $passwords = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8);
        $password = Hash::make($passwords);

        //send the password to the user
        Semaphore::message()->send(
            $request->phone_number,
            'Good day, your account has been created successfully. Your password is ' . $passwords . '.'
        );

        try {
            // Create a new SystemUser instance and save it to the database
            $systemuser = new SystemUser;
            $systemuser->FullName = $request->name;
            $systemuser->Email = $request->email;
            $systemuser->PhoneNumber = $request->phone_number;
            $systemuser->Address = $request->Address;
            $systemuser->role = $request->role;
            $systemuser->Password = $password;
            $systemuser->save();

            // Redirect back with success message
            return redirect()->back()->with('success', 'User added successfully');
        } catch (\Exception $e) {
            // Log the exception for debugging purposes
            Log::error($e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', $e->getMessage());
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
            'productimage' => 'required|file|mimes:jpeg,png,pdf',




        ]);
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());

        }
        if ($request->hasFile('productimage')) {
            // Get the file from the request
            $file = $request->file('productimage');

            // Generate a unique filename
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

            // Move the file to the public storage directory
            $file->storeAs('', $fileName, 'public_upload');

            // Optionally, you can get the public URL of the uploaded file
            $publicUrl = asset($fileName);

            try{
                $product = new productinformation;
                    $product->productname = $request->productname;
                    $product->productdescription = $request->productdescription;
                    $product->productprice = $request->productprice;
                    $product->productquantity = $request->productquantity;
                    $product->productcategory = $request->productcategory;
                    $product->productstatus = $request->productstatus;
                    $product->productimage = $publicUrl;
                    $product->save();

                    // Redirect back with success message
                    return redirect()->back()->with('success', 'Product added successfully');



                } catch (\Exception $e) {
                    // Log the exception for debugging purposes
                    Log::error($e->getMessage());

                    // Redirect back with error message
                    return redirect()->back()->with('error', $e->getMessage());
                }

        }else{
            return redirect()->back()->with('error', 'Error Uploading Image');
        }





    }
    public function deleteProduct($id){
        $product = productinformation::find($id);
        $product->delete();


        return redirect()->back()->with('success', 'Product deleted successfully');



    }

    public function smsApi(){


        return view('administrator.sms', compact('smsapi'));
    }


    function order(){
        //select all data from the orderinformation table inner join by customerInformation table
        $orders = orderinformation::join('customerInformation', 'orderinformation.customer_id', '=', 'customerInformation.id');
        return view('administrator.order', compact('orders'));



    }
    public function customer(){
        $customers = SystemUser::where('role', 'User')->get();
        return view('administrator.customer', compact('customers'));

    }
    public function maintenance(){
        $maintenance = maintenanceInformation::all();
        return view('administrator.maintenance', compact('maintenance'));

    }
    public function delivery(){
        $systemusers = SystemUser::where('role', 'Rider')->get();
        return view('administrator.delivery', compact('systemusers'));

    }

}
