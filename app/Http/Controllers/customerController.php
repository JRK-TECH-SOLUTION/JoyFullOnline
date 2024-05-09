<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\productinformation;
use App\Models\orderinformation;
use App\Models\customerInformation;
use App\Models\maintenanceInformation;
use App\Models\CustomerCart;
use App\Models\smsAPI;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;


class customerController extends Controller
{
   
    public function dashboard(){
        

        //select all products from the database
        $products = productinformation::all();
        return view('users.dashboard', compact('products'));

    }
    public function corderbycustomer(){
        $userid = auth()->user()->id;
        //select all customercart and productinformation from the database where the customerID is equal to the logged in user and CustomerCart.id have allias as cartid
        $corderbycustomer = CustomerCart::select('customercart.*', 'productinformations.*')
        ->join('productinformations', 'productinformations.id', '=', 'customercart.productID')
        ->where('customerID', $userid)
        ->get();
        //returm the route name mycart witj the data corderbycustomer
        return view('users.order', compact('corderbycustomer'));

    }
    public function addtocartItem(Request $request){
    

        try {
            $addtocart = new CustomerCart;
            $addtocart->customerID = $request->userid;
            $addtocart->productID = $request->item_id;
            $addtocart->price = $request->item_price;
            $addtocart->quantity = $request->quantity;

            //convert the price to integer
            $price = (int)$request->item_price;
            $quantity = (int)$request->quantity;

            $total = $price * $quantity;
            $addtocart->total = $total;

            $addtocart->save();



            return redirect()->back()->with('success', 'Product added to cart successfully');
        } catch (\Exception $e) {
            // Log the exception for debugging purposes
            Log::error($e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
