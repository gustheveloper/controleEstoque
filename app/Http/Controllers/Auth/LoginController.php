<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
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
    protected $redirectTo = '/produtos';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function googleRedirect()
    {
      return Socialite::driver('google')->redirect();
    }

    public function receiveDataGoogle()
    {
      $googleUser = Socialite::driver('google')->user();
      $userDB = $this->findOrCreateUser($googleUser);
      Auth::login($userDB, true);

      return redirect($this->redirectTo);
    }

    public function findOrCreateUser($googleUser)
    {
      $user = User::where('email', $googleUser->email)->first();
      if ($user){
        return $user;
      }

      $newUser = new User();
      $newUser->name = $googleUser->name;
      $newUser->email = $googleUser->email;
      $newUser->img_profile = $googleUser->avatar;
      $newUser->provider_id = $googleUser->id;
      $newUser->active = 1;
      $newUser->password = $googleUser = 'null';

      $newUser->save();

      return $newUser;
    }
}
