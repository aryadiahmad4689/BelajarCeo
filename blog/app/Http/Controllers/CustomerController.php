<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Customer::all();

        return view('customer.index',compact('customers'));
    }

    public function tampilCreate()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $customer = new Customer;
        $customer->name = $request->nama;
        $customer->email = $request->email;
        $customer->save();

        return redirect()->route('customer.index');
    }

    public function tampilEdit($id)
    {
        // dd($id);
        $customer = Customer::findOrFail($id);
        // dd($customer);
        return view('customer.edit',compact('customer'));
    }

    public function update(Request $request,$id)
    {
        $customer = Customer::findOrFail($id);
        // dd($customer);
        $customer->name = $request->nama;
        $customer->email = $request->email;

        $customer->save();

        return redirect()->route('customer.index');
    }

    public function delete($id)
    {
        $customer = Customer::findOrFail($id);

        $customer->delete();

        return redirect()->route('customer.index');
    }

}
