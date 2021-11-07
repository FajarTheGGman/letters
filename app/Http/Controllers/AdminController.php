<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $user){
        if($user->session()->get('email')){
            return view('admin.index');
        }else{
            return back();
        }
    }
}
