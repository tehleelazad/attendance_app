<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\usermodel;

class login extends Controller
{
    function login (Request $req)
    {
        $username=$req->username;
        $password=$req->password;

         $records=usermodel::where('username',$username)
           ->where('password',$password)
              ->get();
             if($records->isNotEmpty()){
              $req->session()->put('uid',$records[0]);
               return redirect('role/userprofile');
             }
             else {
                return redirect('userform')->with ('msg','Invalid Username or password');
             }
    }
    function logout (Request $req){
        $req->session()->forget('uid');
        return redirect('userform')->with ('msg','Successfully logged out');


            }
        
}
    