<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Model\admin\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function showLoginForm()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        $this->validateLogin($request);
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
        return $this->sendFailedLoginResponse($request);
    }
    protected function credentials(Request $request)
    {

        $admin = Admin::where('email', $request->email)->first();
        if ($admin) {
            if ($admin->status == 0) {
                return ['email' => 'inactive', 'password' => 'You are not active user please contact Admin'];
            }else{
                return ['email' => $request->{$this->username()}, 'password' => $request->password, 'status' => 1];

            }

        }
        return $request->only($this->username(), 'password');
    }


    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function guard()
    {
        return Auth::guard('admin');
    }
}
