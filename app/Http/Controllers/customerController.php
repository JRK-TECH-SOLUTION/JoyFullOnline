<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SystemUser;
use App\Models\productinformation;
use App\Models\smsAPI;


class customerController extends Controller
{
    public function cdashboard(){
        return view('customer.dashboard');
    }
}
