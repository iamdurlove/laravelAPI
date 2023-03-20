<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;


class RegistrationController extends Controller
{
    public function index()
    {
        $customer = new Customers; // to update the fields values as null
        $header = 'Customer Registration';
        $url = url('/customer');
        $data = compact('url', 'header', 'customer');
        return view('register')->with($data);
    }

    public function upload(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        $filename = time() . "-ws." . $request->file('image')->getClientOriginalExtension();
        echo $request->file('image')->storeAs('upload', $filename);

    }
}