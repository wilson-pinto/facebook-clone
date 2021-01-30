<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showRegForm()
    {
        return view('pages.register');
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'confirmPassword' => ['required', 'string', 'min:8'],
            'profile' => ['required', 'file'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (empty($user)) {

            $imgUrl = "";

            if ($request->hasFile('profile')) {
                $imgUrl =  time() . '_' .  $request->profile->getClientOriginalName();
                request()->profile->move(public_path('img/profile/'), $imgUrl);
            }

            $u = new User();

            $u->email = $request->email;
            $u->name = $request->name;
            $u->password = Hash::make($request->password);
            $u->email = $request->email;
            $u->img_url = $imgUrl;
            $u->save();

            Auth::login($u);

            return redirect()->intended('/');
        } else {
            throw ValidationException::withMessages([
                'email' => 'Email already exist'
            ]);
        }
    }
}
