<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginCredentialRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register() {
        return view("auth.register");
    }

    public function login() {
        return view("auth.login");
    }

    public function registerProcess(RegisterRequest $request) {
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $password = Hash::make($data["password"]);
            $data["password"] = $password;
            $user = User::create($data);
            $data["user_id"] = $user->id;
            Profile::create($data);
            DB::commit();
            return redirect()->route('auth.login')->with("success", "registrasi berhasil, silahkan login");
        }catch (\Throwable $th) {
            DB::rollback();
            return back()->with("error", "registrasi gagal karena terjadi kesalahan !");
        }
    }

    public function authenticate(LoginCredentialRequest $request) {
        $credentials = $request->validated();
        if (Auth::attempt($credentials, $request->get('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('user.dashboard'));
        }
        return back()->withErrors([
            'email' => 'Incorrect credentials',
        ])->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login');
    }
}
