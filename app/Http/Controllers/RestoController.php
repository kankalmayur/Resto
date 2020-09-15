<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\restaurant;
use App\Models\User;
use Crypt;
use Session;

class RestoController extends Controller
{
    function index()
    {
        return view('home');
    }

    function list()
    {
        $data= restaurant::all();
        return view('list',['data'=>$data]);
    }

    function add(Request $req)
    {
        //return $req->input();
        $resto = new restaurant;
        $resto->name=$req->input('name');
        $resto->email=$req->input('email');
        $resto->address=$req->input('address');
        $resto->save();
        $req->session()->flash('status','Restaurant added successfully');
        return redirect('list'); 
    }

    function delete($id)
    {
         restaurant::find($id)->delete();
        Session()::flash('status','Restaurant deleted successfully');
        return redirect('list'); 
    }

    function edit($id)
    {
        $data= restaurant::find($id);
        return view('edit',['data'=>$data]);

    }

    function update(Request $req)
    {   
       // $resto = restaurant::find($req->input('id'));
        $resto = new restaurant;
        $resto->find($req->input('id'));
        $resto->name=$req->input('name');
        $resto->email=$req->input('email');
        $resto->address=$req->input('address');
        $resto->save();
        $req->session()->flash('status','Restaurant updated successfully');
        return redirect('list'); 
    }

    function register(Request $req)
    {   
        
        //return $req->input();
        $user = new User;
        $user->name=$req->input('name');
        $user->email=$req->input('email');
        $user->password=Crypt::encrypt($req->input('password'));
        $user->contact=$req->input('contact');
        $user->save();
        $req->session()->put('user',$req->input('name'));
        return redirect('/'); 

    }

    function login(Request $req)
    {
        $user= User::where("email",$req->input('email'))->get();
        if( Crypt::decrypt($user[0]->password)==$req->input('password'))
        {
            $req->session()->put('user',$user[0]->name);
            return redirect('/');
        }

    }
}
