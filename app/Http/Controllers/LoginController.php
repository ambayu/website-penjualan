<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Biodata;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index(){
      return view('login', [
    "title" => "Login",
    'about' =>Biodata::first(),
]);


}

  public function register(){
      return view('register', [
    "title" => "Registrasi",
    'about' =>Biodata::first(),
]);

  }

  public function logout(Request $request){
     Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');


  }

    public function login(Request $request){

        $login=$request->validate([
        'user_name'=> 'required|min:3',
        'password'=> 'required',
        ]);

        // return $login;

       if(Auth::attempt($login)){
          
        $request->session()->regenerate();
         if(auth()->user()->level_id==0){

                 Auth::logout();

                $request->session()->invalidate();

                $request->session()->regenerateToken();

                return redirect('/login')->with('loginError', 'Segera Hubungi Admin untuk konfirmasi Anggota!');

           }

        return redirect()->intended('/dashboard');
       }

       return redirect('/login')->with('loginError','login failed!');

  }

    public function store(Request $request){
    
       $register= $request->validate([
            'name' => ['required','max:35',],
            'user_name' => ['required','max:35','min:9','unique:users'],
            'email' => ['required','max:35','min:9','email:dns','unique:users'],
            'password' => ['required','max:35','min:6'],
            'password2' => ['required','max:35','min:6','same:password'],
         
       ]); 
       $register['level_id']=0;
       $register['password']=bcrypt($register['password']);

       User::create($register);
    //    $request->session()->flash('success','Registration successfull! Please Login');
       return redirect('/login')->with('success','Registration successfull! Please Login');
    }
}