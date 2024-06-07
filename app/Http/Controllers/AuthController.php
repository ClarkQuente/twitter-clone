<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class AuthController extends Controller
{
    
    public function login() {
        return view('auth.login');
    }

    public function authenticate(Request $request) {

        $request->validate([
            'emailOrUser' => ['required'],
            'password' => ['required']
        ]);

        $isEmail = str_contains($request->emailOrUser, '@');

        if(Auth::attempt([($isEmail ? "email" : "user") => $request->emailOrUser, "password" => $request->password])) {
            $request->session()->regenerate();
            return redirect('/home');
        }

        return back()->with('message', 'Verifique as informações inseridas e tente novamente.');
    }

    public function register() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $user = $request->all();
        $user['password'] = bcrypt($request->password);
        
        $exists = DB::select('SELECT * FROM `users` WHERE `user` = ? OR `email` = ?', [$request->user, $request->email]);
        if($exists) {
            return back()->with('message', 'Usuário ou e-mail já existentes.');
        }

        $imageName = md5($user['user'] . strtotime('now')) . '.png';
        $user['image'] = $imageName;
        
        $user = User::create($user);
        Auth::login($user, true);

        copy(public_path('images/guest-icon.png'), public_path('user-icons/' . $imageName));
        $user['image'] = public_path('images/guest-icon.png');

        return redirect('/home');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

}
