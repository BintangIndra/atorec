<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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
    protected $redirectToadmin = RouteServiceProvider::ADMIN;
    protected $redirectToowner = RouteServiceProvider::OWNER;
    protected $redirectToreseller = RouteServiceProvider::RESELLER;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);
        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
                    ? new Response('', 204)
                    : redirect()->intended($this->redirectPath());
    }

    protected function authenticated(Request $request, $user)
    {
        
    }

    public function redirectPath()
    {
        //$role ubah
        $role = Auth::user()->role;
        if($role == 'reseller'){
            return property_exists($this, 'redirectToreseller') ? $this->redirectToreseller : '/reseller';
        }
        elseif($role == 'admin'){
            return property_exists($this, 'redirectToadmin') ? $this->redirectToadmin : 'admin.index';
        }
        elseif($role == 'owner'){
            return property_exists($this, 'redirectToowner') ? $this->redirectToowner : '/owner';
        }
    }

}
