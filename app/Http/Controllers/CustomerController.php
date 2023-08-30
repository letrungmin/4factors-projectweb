<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.index');
    }
    public function customer()
    {
        $data = Customer::get(); // ~ select * from products
        return view('admin/customer-list', compact('data'));

    }
    public function add()
    {
        return view('customer-add');
    }
    public function edit()
    {
        return view('customer-edit');
    }
    public function delete()
    {
        return view('customer-delete');
    }
    public function login()
    {
        return view('customer.login');
    }
    public function register()
    {
        return view('customer.register');
    }
    public function loginProcess(Request $request)
    {
        $customer = Customer::where('customerEmail', '=', $request->username)->first();
        if ($customer) {
            if ($customer->customerPassword == $request->password) {
                $request->session()->put('customerID', $customer->customerID);
                $request->session()->put('customerName', $customer->customerName);
                $request->session()->put('customerEmail', $customer->customerEmail);
                return redirect('customer/index');
            } else {
                return redirect()->back()->with('fail', 'Password not match!');
            }
        } else {
            return redirect()->back()->with('fail', 'User name is not existed!');
        }
    }
    public function registerAdd()
    {
        $customer= Customer::get();
        return view('customer.register-add', compact('customer'));
    }
    public function registersave(Request $request)
    {
        $customer = new Customer();
        $customer->customerEmail = $request->email;
        $customer->customerPassword = $request->password;
        $customer->customerPhonenumber = $request->phone;
        $customer->customerAddress = $request->address;
        $customer->customerName = $request->name;
        $customer->save();
        return redirect()->back()->with('success', 'Register added successfully!');
    }

}
