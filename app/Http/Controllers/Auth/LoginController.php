<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
   // LoginController.php
public function login(Request $request)
{   
    $input = $request->all();
   $auth=Auth();
    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
    ]);
   
    if($auth->attempt(array('email' => $input['email'], 'password' => $input['password'])))
    {
        if ($auth->user()->role->nom == 'admin') {
            return redirect()->route('admin.home');
        }else if ($auth->user()->role->nom == 'superadmin') {
            return redirect()->route('superadmin.home');
        }
        else if ($auth->user()->role->nom == 'moderateur') {
            return redirect()->route('moderateur.home');
        }else{
            return redirect()->route('user.home');
        }
    }else{
        return redirect()->route('login')
            ->with('error','Email-Address And Password Are Wrong.');
    }
        
}
public function logout(Request $request){
    Auth::logout();
    return redirect()->route('login');
}

}
