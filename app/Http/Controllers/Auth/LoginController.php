<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\PersonalDetail;
use App\Models\BusinessDetail;
use Auth;
use App\Notifications\VerificationCode;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectPath(){
			return route('admin.profile');
    }
	
	protected function authenticated(Request $request, $user)
    {
        $user->generateTwoFactorCode();
        $user->notify(new VerificationCode());
    }
}
