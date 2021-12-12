<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Template;
use App\Models\Inbox;
use App\Models\Role;
use App\Models\Notify;
use Barryvdh\DomPDF\Facade as PDF;


class LetterController extends Controller
{
    public function index(Request $user){
        if(!$user->session()->get('role')){
            return back();
        }else{
            return view('letters.letters', ['notify' => Notify::all()]);
        }
    }

    public function send(Request $user){
        if(!$user->session()->get('firstname')){
            return back();
        }else{
            return view('letters.send', ['role' => Role::all(), 'notify' => Notify::all()]);
        }
    }

    public function send_post(Request $data){
        if(!$data->session()->get('firstname')){
            return back();
        }else{
            Inbox::insert([
                'subject' => $data->subject,
                'from' => $data->session()->get('firstname'),
                'body' => $data->body,
                'role' => $data->role,
                'letter' => 'none.pdf',
                'date' => date('D-M-Y')
            ]);

            return back()->with('done', 'done');
        }
    }

    public function inbox(Request $user){
        if(!$user->session()->get('firstname')){
            return back();
        }else{
            if($user->session()->get('level') == 'admin'){
                return view('letters.inbox', ['inbox' => Inbox::all(), 'notify' => Notify::all()]);
            }else{
                return view('letters.inbox', ['inbox' => Inbox::where('role', $user->session()->get('role'))->get(), 'notify' => Notify::all()]);
            }
        }
    }

    public function inbox_overview(Request $user, $id){
        if(!$user->session()->get('firstname')){
            return back();
        }else{
            $data = Inbox::where('id', $id)->first();
            return view('letters.inbox_overview', ["data" => $data, 'notify' => Notify::all()]);
        }
    }

    public function inbox_delete(Request $user, $id){
        if(!$user->session()->get('firstname')){
            return back();
        }else{
            Inbox::where('id', $id)->delete();
            return redirect()->route('inbox-letter');
        }
    }

    public function search(Request $data){
        if(!$data->session()->get('role')){
            return back();
        }else{
            $query = Template::where('title', 'like', '%'.$data->search.'%')->get();
            return view('letters.search', ['data' => $query, 'notify' => Notify::all()]);
        }
    }

    public function create(Request $data){
        if($data->file('cover')){
            $file = $data->file('cover');
            $file->move('./uploads/temp/', $file->getClientOriginalName());
        }

        $check = Template::where('title', $data->title)->count();
        if($check > 0){
            return back()->with('already', 'already');
        }else{
            try{
                Template::insert([
                    'title' => $data->title,
                    'desc' => $data->desc,
                    'address' => $data->alamat,
                    'banner' => $data->file('cover') ? url('/').'/uploads/temp/'.$file->getClientOriginalName() : 'none.png',
                    'tone_title' => $data->tone_title,
                    'body' => $data->body,
                    'date' => date('d-m-y')
                ]);

                $get = Template::where('title', $data->title)->first();

                Notify::insert([
                    'title' => 'Template baru : '.$data->title,
                    'body' => route('overview-letter', $get->id),
                    'desc' => 'Template baru dari '.$data->session()->get('firstname')
                ]);

                return back()->with('success', 'success');
            }catch(\Exception $e){
                if($e){
                    $pdf_data = PDF::setOptions(['isRemoteEnabled' => true, 'isHtml5ParserEnabled' => true])->loadView('letters-template.custom', [
                        'banner' => $data->banner,
                        'title' => $data->title,
                        'tone_title' => $data->tone_title,
                        'alamat' => $data->address,
                        'desc' => $data->desc,
                        'body' => $data->body,
                    ]);
                    return $pdf_data->stream();
                }
            }
        }
    }

    public function template(Request $user){
        if(!$user->session()->get('firstname')){
            return back();
        }else{
            $data = Template::all();
            return view('letters.template',  ['data' => $data, 'notify' => Notify::all()]);
        }
    }

    public function overview(Request $user, $id){
        if(!$user->session()->get('firstname')){
            return back();
        }else{
            $data = Template::where('id', $id)->first();
            $pdf_data = PDF::setOptions(['isRemoteEnabled' => true, 'isHtml5ParserEnabled' => true])->loadView('letters-template.custom', [
                'banner' => $data->banner,
                'title' => $data->title,
                'tone_title' => $data->tone_title,
                'alamat' => $data->address,
                'desc' => $data->desc,
                'body' => $data->body,
            ]);

            return $pdf_data->stream();
        }
    }

    public function delete(Request $user, $id){
        if(!$user->session()->get('firstname')){
            return back();
        }else{
            $data = Template::where('id', $id)->first();
            Notify::where('title', 'Template baru : '.$data->title)->delete();
            Template::where('id', $id)->delete();
            return back()->with('done', 'done');
        }
    }
}
