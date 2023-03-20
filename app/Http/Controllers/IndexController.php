<?php

namespace App\Http\Controllers;

use App\Models\Blood;
use App\Models\Customers;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
        //blood_id = 3 => customers
        return Blood::with('getCustomers')->get();
        // return Customers::find(2)->getBloodGroup()->get();
        // return Customers::with('getBloodGroup')->get();
    }

    public function index2()
    {
        return Customers::all();
    }
}