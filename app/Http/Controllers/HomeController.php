<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Services\ActionServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Session::put('page', 'dashboard');
        $employees = User::where('is_admin','!=',0)->count();
        $customers = (new ActionServices())->fetchCustomers()->count();
        $actions = (new ActionServices())->fetchActions()->count();

        return view('home',compact('employees','actions','customers'));
    }
}
