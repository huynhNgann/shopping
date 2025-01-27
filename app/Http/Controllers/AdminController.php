<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
class AdminController extends Controller
{
    public function loginAdmin(){
        if(auth()->check()){
            
        }
        return view('backend.login');
    }
    public function postLoginAdmin(Request $request)
    {
        $remember=$request->has('remember_me') ? true : false;
        if(auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ],$remember)){
            return redirect()->to('admin/home');
        }
        return view('backend.login');
    }

}
