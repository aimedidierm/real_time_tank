<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Manager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $admin = Admin::where('email', $email)->first();
        $manager = Manager::where('email', $email)->first();
        if ($admin != null) {
            $passwordMatch = Hash::check($password, $admin->password);
            if ($passwordMatch) {
                Auth::login($admin);
                return redirect("/admin/managers");
            } else {
                return redirect("/")->withErrors(['msg' => 'Incorect password']);
            }
        } elseif ($manager != null) {
            $passwordMatch = Hash::check($password, $manager->password);
            if ($passwordMatch) {
                Auth::guard("manager")->login($manager);
                return redirect("/manager/dashboard");
            } else {
                return redirect("/")->withErrors(['msg' => 'Incorect password']);
            }
        } else {
            return redirect('/')->withErrors(['msg' => 'Incorect email and password']);
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect(route("login"));
        } else if (Auth::guard('manager')->check()) {
            Auth::guard("manager")->logout();
            return redirect(route("login"));
        }
    }
}
