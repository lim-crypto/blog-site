<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\admin\Admin;
use App\Model\admin\Admin_role;
use App\Model\user\Post;
use App\Model\user\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        // array data
        //data
        $data = [
            'total_post' => Post::count(),
            'total_user' => User::count(),
            'total_admin' => Admin::count(),
            'inactived_admin' => Admin::where('status', 0)->count(),
        ];

        return view('admin.home')->with($data);
    }
}
