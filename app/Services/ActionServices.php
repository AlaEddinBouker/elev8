<?php
namespace App\Services;

use App\Models\Action;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ActionServices
{

    public function fetchCustomers()
    {
        if (Auth::user()->isAdmin()) {
         $customers = Customer::latest()->get();
        } else {
            $customers = Auth::user()->customers;
        }

        return $customers;
    }
    public function fetchActions()
    {
        if (Auth::user()->isAdmin()) {
         $actions = Action::latest()->get();
        } else {
            $actions = Auth::user()->actions;
        }

        return $actions;
    }

    public function createAction(Request $request)
    {
        Action::create($request->all());
    }
    public function updateAction(Request $request)
    {
        Action::findorfail($request->id)->update($request->all());
    }

}
