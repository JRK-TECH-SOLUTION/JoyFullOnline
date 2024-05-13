<?php

namespace App\Http\Controllers;
use App\Models\productinformation;
use App\Models\orderinformation;
use App\Models\customerInformation;
use App\Models\maintenanceInformation;
use App\Models\checkout;
use Illuminate\Http\Request;

class KitchenStaff extends Controller
{
    public function dashboard(){
        return view('kitchenstaff.dashboard');
    }

}
