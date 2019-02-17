<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    

    

    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users', // takes from email input field laravel validates to be required email unique in users table
            'user_name' => 'required|max:120',
            'password' => 'required|min:4'


        ]);
        $email = $request['email']; //requests email field from welcome view name="email"
        $user_name = $request['user_name'];
        $password = bcrypt($request['password']); 

        $user = new User(); // in App/User
        $user->email = $email;
        $user->user_name = $user_name;
        $user->password = $password;

        $user->save();

        Auth::login($user); // automaticly logs in user

        return redirect()->route('habits'); // redirect to route ('dashboard');

    }

    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request['email'],'password' => $request['password']]))  {
            return redirect()->route('habits');
        }
        return redirect()->back();
  
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }


}
