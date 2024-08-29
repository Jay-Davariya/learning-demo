<?php

namespace App\Http\Controllers;

use App\Models\customerproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\UserLoggedIn;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

        public function index()
        {
          //
        }
    
        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        public function dashboard()
        {
            // Auth       
            // $customers = Customer::withCount('products')->whereNull('deleted_at')->get();
            $data= CustomerProduct::get();
            //  event(new UserLoggedIn($customer));
            $alldata =  Customer::whereNull('deleted_at')
            ->get();
            // $data = customerproduct::where('product','logo.jpg')->orwhere('customer_id','261');
    
            // Fetch records from the 'customers' table where 'deleted_at' is null
    
    
            return view('home',compact('data','alldata'));
        }
    
    }
