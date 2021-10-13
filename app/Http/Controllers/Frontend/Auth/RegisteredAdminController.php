<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Actions\File;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredAdminController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('frontend.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
            'con-password' => ['required'],
            'image' => ['required', 'image', 'mimes:jpg,png'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' => File::upload($request->file('image'), 'user'),
            'password' => Hash::make($request->password),
        ]);

        // event(new Registered($user));

        $request->session()->regenerate();
        Auth::guard('user')->login($user);

        return redirect(RouteServiceProvider::USER_HOME);
    }
}
