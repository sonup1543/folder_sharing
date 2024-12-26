<?php

namespace App\Http\Controllers\Auth;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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
     
    /*protected function redirectTo()
    {
        $rolesId = Auth::user()->roles_id;
        
        if ($rolesId == '2') {
            return RouteServiceProvider::CSHOME;
        } elseif ($rolesId == '3') {
            return RouteServiceProvider::ACCHOME;
        } elseif ($rolesId == '4') {
            return RouteServiceProvider::CREHOME;
        } elseif ($rolesId == '5') {
            return RouteServiceProvider::CREHDHOME;
        } elseif ($rolesId == '6') {
            return RouteServiceProvider::CSMNGHOME;
        } elseif ($rolesId == '7') {
            return RouteServiceProvider::HRHOME;
        } elseif ($rolesId == '8') {
            return RouteServiceProvider::MNGHOME;
        } elseif ($rolesId == '9') {
            return RouteServiceProvider::OPSHOME;
        } elseif ($rolesId == '10') {
            return RouteServiceProvider::OPSMNGHOME;
        } else {
            return RouteServiceProvider::HOME;
        }
    }*/
    protected function authenticated(Request $request, $user)
    {
        
        if($user->id < 4){
            
            if ($user->status != 1) {
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
    
                return redirect('/login')->withErrors(['msg' => 'Your account has been inactive, please contact the admin.']);
            }
            
        }
        else{
            
            $employee = Employee::Where('official_emailid', $user->email)->first();
            $department = Department::where('id', $employee->department_id)->first();
            
            if ($department->status != 1) {
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
    
                return redirect('/login')->withErrors(['msg' => 'Your department has been inactive, please contact the admin.']);
            }
            
            if ($user->status != 1) {
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
    
                return redirect('/login')->withErrors(['msg' => 'Your account has been inactive, please contact the admin.']);
            }
            
        }
        

        $rolesId = $user->roles_id;
        if ($rolesId == '2') {
            return redirect(RouteServiceProvider::CSHOME);
        }else {
            return redirect(RouteServiceProvider::HOME);
        }
    }
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
