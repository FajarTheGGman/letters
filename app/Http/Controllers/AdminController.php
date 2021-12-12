<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Template;
use App\Models\Role;
use App\Models\Inbox;
use PDF;

class AdminController extends Controller
{
    public function index(Request $user){
        if($user->session()->get('email')){
            return view('admin.index', [
                'firstname' => $user->session()->get('firstname'),
                'lastname' => $user->session()->get('lastname'),
                'users' => Users::all()->count(),
                'template' => Template::all()->count(),
                'admin' => Users::where('role', 'admin')->count(),
                'inbox' => Inbox::all()->count()
            ]);
        }else{
            return back();
        }
    }

    public function role(Request $user){
        if($user->session()->get('role') != 'admin'){
            return back();
        }else{
            return view('masterdata.role', ['list' => Role::all()]);
        }
    }

    public function role_post(Request $user){
        if($user->session()->get('role') != 'admin'){
            return back();
        }else{
            Role::insert([
                'name' => $user->name,
                'level' => $user->role
            ]);
            return back();
        }
    }

    public function role_delete(Request $user, $id){
        if($user->session()->get('role') != 'admin'){
            return back();
        }else{
            Role::where('id', $id)->delete();
            return back();
        }
    }

    public function adduser(Request $user){
        if(!$user->session()->get('role') && $user->session()->get('role') != 'admin' ){
            return back();
        }
        return view('admin.adduser', ['users' => Users::all()]);
    }

    public function newAdmin(Request $user){
        $check = Users::where('email', $user->email)->count();
        dd($check);
    }
}
