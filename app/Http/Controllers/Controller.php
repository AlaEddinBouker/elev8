<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function upload($avatar, $path)
    {
        $avataName = '/admin_files/images/' . $path . '/' . time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->save(public_path() . $avataName, 60);

        return $avataName;
    }
}
