<?php

namespace App\Http\Controllers;
use Humans\Semaphore\Laravel\Facades\Semaphore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\customerInformation;

use Illuminate\Support\Facades\Hash;


class SystemLoad extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function login(){
        return view('login');
    }
    public function createaccount(){
        return view('signup');
    }

    //create an account
    public function accountcreation(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:system_users,email',
            'phone_number' => 'required|string|min:11|max:11|unique:system_users,phone_number',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|same:password',
            'name="terms' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());

        }
        //generate 6 digit verification code
        $verification_code = mt_rand(100000, 999999);
        $password = Hash::make($request->password);
        try {
            Semaphore::message()->send(
                $request->phone_number,
                'Good day, your verification code is ' . $verification_code . '. Kindly enter this code to verify your account. Thank you.'
            );
            // Create a new SystemUser instance and save it to the database
            $user = new customerInformation();
            $user->FullName = $request->name;
            $user->Email = $request->email;
            $user->PhoneNumber = $request->phone_number;
            $user->Password = $password;
            $user->VerificationCode = $verification_code;
            $user->save();
            //redirect to /verify page
            return redirect()->route('verify')->with('success', 'Account created successfully. Please verify your account');
        } catch (\Exception $e) {
            // Log the exception for debugging purposes
            Log::error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }


    }

}
