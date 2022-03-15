<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Customer;
use App\Services\CustomerServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ActionController extends Controller
{

    public function index()
    {
        Session::put('page', 'actions');
        $actions = (new CustomerServices())->fetchActions();
        return view('actions.index', compact('actions'));
    }

    function create()
    {
        $customers = (new CustomerServices())->fetchCustomers();
        return view('actions.create',compact('customers'));

    }
    public function edit(Action $action)
    {
        return view('actions.edit',compact('action'));
    }
    public function update()
    {
        # code...
    }
    public function delete()
    {

    }
}
