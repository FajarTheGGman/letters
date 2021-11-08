<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $user){
        if($user->session()->get('email')){
            return view('admin.index', [
                'firstname' => $user->session()->get('firstname'),
                'lastname' => $user->session()->get('lastname')
            ]);
        }else{
            return back();
        }
    }
}
