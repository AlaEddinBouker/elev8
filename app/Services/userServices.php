<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class userServices extends Controller
{
    public function create(Request $request)
    {
        if ($request->avatar) {
            $avatar = $this->upload($request->avatar, 'avatar');
        } else {
            $avatar = null;
        }

        User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'is_admin' => $request->is_admin,
                'avatar' => $avatar,
                'password' => Hash::make($request->password),
            ]
        );
    }

    public function update($request)
    {
        $user = User::findorfail($request->id);
        if ($request->avatar) {
            $avatar = $this->upload($request->avatar, 'avatar');
        } else {
            if ($user->avatar) {
                $avatar = $user->avatar;
            } else {
                $avatar = null;
            }
        }
        if ($request->password) {
            $request->validate([
                'password' => 'min:6|confirmed',
            ]);
            $user->update([

                'name' => $request->name,
                'email' => $request->email,
                'is_admin' => $request->is_admin,
                'avatar' => $avatar,
                'password' => Hash::make($request->password),
            ]);
        } else {
            $user->update([

                'name' => $request->name,
                'email' => $request->email,
                'is_admin' => $request->is_admin,
                'avatar' => $avatar,
            ]);
        }
    }
}
