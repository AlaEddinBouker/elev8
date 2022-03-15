<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index()
    {
        Session::put('page', 'customers');
        $customers = Customer::latest()->get();
        return view('customers.index', compact('customers'));
    }
    public function create()
    {
        $users = User::where('is_admin', '!=', 0)->get();
        return view('customers.create', compact('users'));
    }
    public function store(CustomerRequest $request)
    {
        Customer::create($request->all());
        Session::flash('success_message', 'Customer created with success');
        return redirect()->route('customers');
    }
    public function edit(Customer $customer)
    {
        $users = User::where('is_admin', '!=', 0)->get();
       return view('customers.edit',compact('customer','users'));
    }
    public function update(CustomerRequest $request)
    {
        Customer::findorfail($request->id)->update($request->all());
        Session::flash('success_message', 'Customer updated with success');
        return redirect()->route('customers');
    }
    public function delete($customer)
    {
        $delete = Customer::findorfail($customer)->delete();
        if ($delete == 1) {
            $success = true;
            $message = 'Customer deleted successfully';
        } else {
            $success = true;
            $message = 'Something went wrong';
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
