<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\ConfirmationPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('account.account', compact('user'));
    }
    public function email(Request $request)
    {
        $request->validate([
            'email' => ['required', 'unique:users,email,'.Auth::user()->id],
            'currentpasswordemail'=>['required',new ConfirmationPassword]
        ]);
        User::find(Auth::user()->id)->update([
            'email' => $request->email,

        ]);

        Session::flash('success_message', 'User updated with success');
        return back();
    }
    public function password(Request $request)
    {
       
        $request->validate([
            'password' => ['required', 'confirmed'],
            'currentpassword'=>['required',new ConfirmationPassword]
        ]);
        User::find(Auth::user()->id)->update([
            'password' =>Hash::make($request->password) ,

        ]);
        Session::flash('success_message', 'User updated with success');
        return back();
    }
    public function details(Request $request)
    {

        if ($request->avatar) {
            $avatar = $this->upload($request->avatar, 'avatar');
        }else{
            $avatar = null;
        }

        User::find(Auth::user()->id)->update([
            'name' => $request->name,
            'avatar' => $avatar
        ]);
        Session::flash('success_message', 'User updated with success');
        return back();
    }

}
