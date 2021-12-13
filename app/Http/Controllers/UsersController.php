<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Template;
use App\Models\Role;
use App\Models\Inbox;
use App\Models\Notify;

class UsersController extends Controller
{
    public function index(Request $user){
        if(!$user->session()->get('firstname')){
            return back();
        }else{
            $role = Role::where('name', $user->session()->get('role'))->first();
            return view('dashboard', [
                'users' => Users::where('level', 'Users')->count(),
                'template' => Template::all()->count(),
                'inbox' => Inbox::where('role', $role->name)->count(),
                'notify' => Notify::all()
            ]);
        }
    }

    public function profile(Request $user){
        if(!$user->session()->get('firstname')){
            return back();
        }else{
            $data = Users::where('email', $user->session()->get('email'))->first();
            return view('users.profile', [
                'data' => $data, 
                'notify' => Notify::all(),
                'inbox' => Inbox::where('from', $user->session()->get('firstname'))->count()
            ]);
        }
    }
}
