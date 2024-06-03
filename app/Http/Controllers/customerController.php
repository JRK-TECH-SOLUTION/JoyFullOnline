<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\productinformation;
use App\Models\orderinformation;
use App\Models\SystemUser;
use App\Models\maintenanceInformation;
use App\Models\checkout;
use App\Models\checkoutitem;
use App\Models\CustomerCart;
use App\Models\smsAPI;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Humans\Semaphore\Laravel\Facades\Semaphore;


class customerController extends Controller
{

    public function dashboard(){


        //select all products from the database
        $products = productinformation::all();
        return view('users.dashboard', compact('products'));

    }
    public function corderbycustomer(){
        $grandtotal = 0;
        $userid = auth()->user()->id;
        //select all customercart and productinformation from the database where the customerID is equal to the logged in user and CustomerCart.id have allias as cartid
        $corderbycustomer = CustomerCart::select('customercart.id as cartid', 'customercart.*', 'productinformations.*')
        ->join('productinformations', 'productinformations.id', '=', 'customercart.productID')
        ->where('customerID', $userid)
        ->get();
        foreach($corderbycustomer as $c){
            $grandtotal += $c->productprice * $c->quantity;
        }

        //returm the route name mycart witj the data corderbycustomer
        return view('users.order', compact('corderbycustomer', 'grandtotal'));

    }
    // public function addtocartItem(Request $request){


    //     try {
    //         //check if the the item is already in the cart
    //         $check = CustomerCart::where('customerID', $request->userid)->where('productID', $request->item_id)->first();
    //         if ($check) {
    //             //update the quantity of the item in the cart
    //             $check->quantity = $check->quantity + $request->quantity;
    //             $check->save();

    //         }else{
    //             $addtocart = new CustomerCart;
    //             $addtocart->customerID = $request->userid;
    //             $addtocart->productID = $request->item_id;
    //             $addtocart->price = $request->item_price;
    //             $addtocart->quantity = $request->quantity;

    //             //convert the price to integer
    //             $price = (int)$request->item_price;
    //             $quantity = (int)$request->quantity;

    //             $total = $price * $quantity;
    //             $addtocart->total = $total;

    //             $addtocart->save();
    //         }




    //         return redirect()->back()->with('success', 'Product added to cart successfully');
    //     } catch (\Exception $e) {
    //         // Log the exception for debugging purposes
    //         Log::error($e->getMessage());

    //         // Redirect back with error message
    //         return redirect()->back()->with('error', $e->getMessage());
    //     }
    // }
    public function editquantity(Request $request){
        try {
            //update the quantity of the item in the cart
            $editquantity = CustomerCart::where('id', $request->cartid)->first();
            $editquantity->quantity = $request->quantity;
            $editquantity->save();

            return redirect()->back()->with('success', 'Quantity updated successfully');
        } catch (\Exception $e) {
            // Log the exception for debugging purposes
            Log::error($e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function checkout(Request $request){
        $grandtotals = $request->total;
        $payment = $request->paymenttype;
        $deliverydate = $request->deliverydate;
        $userid = $request->id;
        $deliveryAddress = $request->deliveryaddress;
        $corderbycustomer = CustomerCart::select('customercart.id as cartid', 'customercart.*', 'productinformations.*')
        ->join('productinformations', 'productinformations.id', '=', 'customercart.productID')
        ->where('customerID', $userid)
        ->get();

            return view('users.checkout', compact('payment', 'deliverydate', 'userid', 'grandtotals', 'corderbycustomer', 'deliveryAddress'));



    }
    public function checkoutgcash(){
        return view('users.checkoutgcash');

    }
    public function finalcheck(Request $request){
        //generate a 10 random number
        try{
            $ID = mt_rand(1000000000, 9999999999);
        $orderID = 'ORD'.$ID;
        $userid = $request->userid;
        $total = $request->total;
        $payment = $request->payment;
        $deliverydate = $request->deliverydate;
        $referencenumber = $request->referencenumber;
        //time zone for the date
        date_default_timezone_set('Asia/Manila');
        //date = date now
        $date = date('Y-m-d H:i:s');

        //insert the order information to the database
        $finalcheckout = new checkout;
        $finalcheckout->OrderID = $orderID;
        $finalcheckout->customerID = $userid;
        $finalcheckout->Total = $total;
        $finalcheckout->PaymentMethod = $payment;
        $finalcheckout->OrderDate = $date;
        $finalcheckout->PaymentReference = $referencenumber;
        $finalcheckout->DeliveryDate = $deliverydate;
        $finalcheckout->Address = $request->address;
        $finalcheckout->PaymentStatus = 'PAID';
        $finalcheckout->save();

        // get the last inserted id
        $lastid = $finalcheckout->id;
        $corderbycustomer = CustomerCart::select('customercart.id as cartid', 'customercart.*','productinformations.id as prid', 'productinformations.*')
        ->join('productinformations', 'productinformations.id', '=', 'customercart.productID')
        ->where('customerID', $userid)
        ->get();
            foreach($corderbycustomer as $c){
                //insert the order information to the database
                $finalcheckoutitem = new checkoutitem;
                $finalcheckoutitem->orderID = $lastid;
                $finalcheckoutitem->productID = $c->prid;
                $finalcheckoutitem->price = $c->productprice;
                $finalcheckoutitem->quantity = $c->quantity;
                $finalcheckoutitem->save();
            }
            //search the customer information from the database
            $customer = SystemUser::where('id', $userid)->first();
            //send the sms to the customer
            Semaphore::message()->send(
                $customer->PhoneNumber,
                'Your order has been placed successfully. Your order ID is ' . $orderID . '. Thank you for shopping with us.'
            );

            //delete all the item in the cart
            CustomerCart::where('customerID', $userid)->delete();
           // return the route name mycart with the success message
            return redirect()->route('mycart')->with('success', 'Order placed successfully');
        }catch (\Exception $e) {
            // Log the exception for debugging purposes
            Log::error($e->getMessage());

            // Redirect back with error message
            return redirect()->route('mycart')->with('error', $e->getMessage());
        }

    }
    public function myorder(){
        $userid = auth()->user()->id;
        //select all order information from the database where the customerID is equal to the logged in user
        $myorder = checkout::where('customerID', $userid)->get();
        return view('users.myorder', compact('myorder'));
    }

    public function myorderdetails($id)
    {
        Log::info("Fetching order details for order ID: $id");

        // Fetch the order details from the database
        $checkout = checkout::where('id', $id)->first();
        $myorderdetails = checkoutitem::select('orderitem.*', 'productinformations.*')
            ->join('productinformations', 'productinformations.id', '=', 'orderitem.productID')
            ->where('orderID', $id)
            ->get();
        Log::info("Order details: " . $myorderdetails);

        return response()->json($myorderdetails);
    }


    public function menu(){
        $item = productinformation::all();
        return view('customer.menu', compact('item'));

    }
   //get the pass id and quantity to add to cart
    public function addtocartItem($id, $quantity){
       console.log($id);
       console.log($quantity);
       
    }
}
