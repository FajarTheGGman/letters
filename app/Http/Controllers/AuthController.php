<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use App\Models\Role;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register', ['role' => Role::all()]);
    }

    public function register_post(Request $user){
        if($user->password == $user->passwordverify){
            $password = Hash::make($user->password, ['rounds' => 12]);
        }else{
            return back()->with('notmatch', 'notmatch');
        }

        $email = $user->email;
        $firstname = $user->firstname;
        $lastname = $user->lastname;
        $role = $user->role;
        $level = Role::where('name', $role)->first();

        Users::create([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => $password,
            'role' => $role,
            'level' => $level->level
        ]);

        return back()->with('success', 'success');
    }

    public function login_post(Request $user){
        if($user->session()->get('role')){
            if($user->session()->get('role') == 'admin'){
                return redirect()->route('admin');
            }else{

            }
        }
        $check = Users::where('email', $user->email)->first();

        if($check){
            $hash = Hash::check($user->password, $check->password);
            $role = Role::where('name', $check->role)->first();

            if($hash){
                $user->session()->put(['role' => $role->name, 'level' => $role->level, 'firstname' => $check->firstname, 'lastname' => $check->lastname ,'email' => $check->email]);
                if($role->level == 'admin'){
                    return redirect()->route('admin');
                }else{
                    return redirect()->route('dashboard');
                }
            }else{
                return back()->with('failed', 'failed');
            }
        }else{
            return back()->with('failed', 'failed');
        }
    }

    public function logout(Request $user){
        $user->session()->flush();
        return redirect()->route('login');
    }
}
