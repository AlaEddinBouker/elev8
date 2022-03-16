<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Action;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Services\ActionServices;
use App\Http\Requests\ActionRequest;
use Illuminate\Support\Facades\Session;

class ActionController extends Controller
{

    public function index()
    {
        Session::put('page', 'actions');
        $actions = (new ActionServices())->fetchActions();
        return view('actions.index', compact('actions'));
    }

    function create()
    {
        $users = User::latest()->get();
        $customers = (new ActionServices())->fetchCustomers();
        return view('actions.create',compact('customers','users'));

    }
    public function store(ActionRequest $request)
    {
       (new ActionServices())->createAction($request);
       Session::flash('success_message', 'Action created with success');
       return redirect()->route('actions');
    }
    public function edit(Action $action)
    {
        $users = User::latest()->get();
        $customers = (new ActionServices())->fetchCustomers();
        return view('actions.edit',compact('action','users','customers'));
    }
    public function update(ActionRequest $request)
    {
        (new ActionServices())->updateAction($request);
       Session::flash('success_message', 'Action updated with success');
       return redirect()->route('actions');
    }
    public function delete($action)
    {
        $delete = Action::findorfail($action)->delete();
        if ($delete == 1) {
            $success = true;
            $message = 'Action deleted successfully';
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
