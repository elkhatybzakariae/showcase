<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $breads = [
            ['title' => 'Tableau de bord', 'url' => null],
            ['text' => 'Tableau', 'url' => null], // You can set the URL to null for the last breadcrumb
        ];

        // Return the view with data
        return view('pages.admin.index');
    }


    public function signuppage()
    {
        return view('auth.admin.sign-up');
    }
    public function signinpage()
    {

        return view('auth.admin.sign-in');
    }

    public function signin(Request $request)
    {
        $v = $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|string|min:8',
        ]);
        $u = User::where('email', $request->email)->first();
        if ($u) {
            if (Hash::check($request->password, $u->password)) {


                Auth::login($u);
                session(["admin" => $u]);
                $url = session('url.intended');
                if ($url) {
                    session(['url' => null]);
                    return redirect()->to($url);
                }
                return redirect()->route('admin.index');
            }
        }
        return back()->with('error', 'Invalid email or password.');
    }
    public function signout()
    {
        Auth::logout();
        return redirect()->route('auth.admin.signIn');
    }




    





    public function showLinkRequestForm()
    {
        return view('auth.admin.forgot');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'We can\'t find a user with that email address.']);
        }
        $token = Str::random(60);
        $user = User::where('email', $request->email)->update([
            'token' => bcrypt($token),
        ]);
        Mail::send('auth.admin.email', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Your Password Reset Link');
        });

        return back()->with(['status' => 'We have emailed your password reset link!']);
    }
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.admin.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);
        $user = User::where('email', $request->email)->first();

        // Check if the user exists and if the token is valid
        if (!$user || !Hash::check($request->token, $user->token)) {
            return back()->withErrors(['email' => 'The provided credentials are incorrect.']);
        }



        // Reset the user's password
        Admin::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);


        return redirect()->route('auth.admin.signIn')->with('status', 'Your password has been reset!');
    }
}
