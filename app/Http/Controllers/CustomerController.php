<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        //for searching customers
        $search = $request['search'] ?? "";
        if ($search != "") {
            // search datas
            $customers = Customers::where('name', 'like', "%$search%")->orWhere('email', 'like', "%$search%")->get();

        } else {
            //selecting all customers if no search
            $customers = Customers::paginate(15);
        }
        // to show customers
        $count = 1;
        $data = compact('customers', 'search', 'count');
        return view('customer')->with($data, 'getBloodGroup');
    }

    public function trash()
    {
        $count = 1;
        $customers = Customers::onlyTrashed()->get();
        $data = compact('customers', 'count');
        return view('customer-trash')->with($data);
    }
    public function store(Request $request)
    {
        // p($request->all());
        // die;

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'gender' => 'required',
            'password' => 'required|string',
            'password_confirmation' => 'required|same:password',
        ]);

        $customers = new Customers;
        $customers->name = $request['name'];
        $customers->email = $request['email'];
        $customers->gender = $request['gender'];
        $customers->phone = $request['number'];
        $customers->address = $request['address'];
        $customers->country = $request['country'];
        $customers->password = md5($request['password']);
        $customers->save();

        return redirect('customer');
    }

    public function delete($id)
    {
        $customer = Customers::find($id);
        if (!is_null($customer)) {
            $customer->delete();
        }
        return redirect('customer');

    }

    public function forceDelete($id)
    {
        $customer = Customers::withTrashed()->find($id);
        if (!is_null($customer)) {
            $customer->forceDelete();
        }
        return redirect('customer/trash');

    }
    public function restore($id)
    {
        $customer = Customers::withTrashed()->find($id);
        if (!is_null($customer)) {
            $customer->restore();
        }
        return redirect('customer/trash');

    }

    public function edit($id)
    {
        $customer = Customers::find($id);
        if (is_null($customer)) {
            return redirect('customer');
        } else {
            $header = 'Customer Update';
            $url = url('/customer/update') . '/' . $id;
            $data = compact('customer', 'url', 'header');
            return view('register')->with($data);
        }
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'gender' => 'required',
            'password' => 'required|string',
            'password_confirmation' => 'required|same:password',
        ]);

        $customers = Customers::find($id);
        $customers->name = $request['name'];
        $customers->email = $request['email'];
        $customers->gender = $request['gender'];
        $customers->phone = $request['number'];
        $customers->address = $request['address'];
        $customers->country = $request['country'];
        $customers->password = md5($request['password']);
        $customers->save();
        return redirect('customer');
    }

}