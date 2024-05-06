<?php

namespace App\Http\Controllers;
use Humans\Semaphore\Laravel\Facades\Semaphore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\customerInformation;
use App\Models\SystemUser;
use Illuminate\Support\Facades\Auth;
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


    function accountcreation(Request $request){

        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:system_users,email',
            'password' => 'required|string|min:8',
            'confirmpassword' => 'required|string|same:password',
            'terms' => 'required',
            'address' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        // // Validation passed, add logic for successful registration
        // // Redirect to a success page or any other desired location
        // return redirect()->route('success')->with('success', 'Registration successful!');

       // generate 6 digit verification code
        $verification_code = mt_rand(100000, 999999);
        $password = Hash::make($request->password);
        try {
            Semaphore::message()->send(
                $request->phonenumber,
                'Your verification code is ' . $verification_code . ''
            );
            // Create a new SystemUser instance and save it to the database
            $user = new customerInformation();
            $user->FullName = $request->fullname;
            $user->Email = $request->email;
            $user->PhoneNumber = $request->phonenumber;
            $user->Address = $request->address;
            $user->Password = $password;
            $user->VerificationCode = $verification_code;
            $user->save();
            //redirect to /verify page and pass the phone number to the view and the sucess message

            return redirect()->route('verify', ['phone_number' => $request->phonenumber])->with('success', 'Account created successfully. Kindly verify your account.');
        } catch (\Exception $e) {
            // Log the exception for debugging purposes
            Log::error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function verify(){
        $phoneNumber = request()->query('phone_number');
        return view('verify', compact('phoneNumber'));
    }
    public function verifyNumber(Request $request){
        $validator = Validator::make($request->all(), [
            'verification_code' => 'required|numeric|digits:6',
            'phone_number' => 'required|numeric|digits:11',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $user = customerInformation::where('PhoneNumber', $request->phone_number)->first();
        if ($user->VerificationCode == $request->verification_code) {
            $user->email_verified_at = now();
            $user->Status = 'Active';
            $user->remember_token = $request->_token;
            $user->save();
            return redirect()->route('login')->with('success', 'Account verified successfully. You can now login.');
        }
        return redirect()->back()->with('error', 'Invalid verification code. Please try again.');
    }
    public function applylogin(Request $request){

        $user = customerInformation::where('Email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->Password)) {

                $userid = $user->id;
                $role='customer';
                // add the session id
                session(['user_id' => $userid]);
                return redirect()->route('cdashbaord')->with('success', 'Login successful!');
            }else{
                $systemuser = SystemUser::where('email', $request->email)->first();
                if ($systemuser) {
                    if (Hash::check($request->password, $systemuser->password)) {

                        $role = $systemuser->role;
                        if($role=='Owner'){
                            Auth::login($systemuser);
                            return redirect()->route('cdashboard')->with('success', 'Login successful!');
                        }else if($role == 'KitchenStaff'){
                            Auth::login($systemuser);
                            return redirect()->route('kdashboard')->with('success', 'Login successful!');

                        }

                    }
                }
            }
            return redirect()->back()->with('error', 'Invalid password. Please try again.');
        }
        return redirect()->back()->with('error', 'Invalid email. Please try again.');

    }
}
