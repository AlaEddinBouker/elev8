<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\userServices;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\EmployeeUpdateRequest;

class EmployeeController extends Controller
{
    public function index()
    {
        Session::put('page', 'employees');
        $users = User::latest()->get();
        return view('employees.index', compact('users'));
    }
    public function create()
    {
        return view('employees.create');
    }

    public function store(EmployeeRequest $request)
    {
        (new userServices())->create($request);
        Session::flash('success_message', 'Employee created with success');
        return redirect()->route('employees');
    }
    public function edit(User $user)
    {
        return view('employees.edit', compact('user'));
    }

    public function update(EmployeeUpdateRequest $request)
    {
        (new userServices())->update($request);
        Session::flash('success_message', 'Employee updated with success');
        return redirect()->route('employees');
    }
    public function delete($user)
    {
        $delete = User::findorfail($user)->delete();
        if ($delete == 1) {
            $success = true;
            $message = 'User deleted successfully';
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
