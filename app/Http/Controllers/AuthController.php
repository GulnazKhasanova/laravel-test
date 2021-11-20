<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create(){
        {
            return view('auth');
        }
    }
    public function auth_check( Request $request ){
      $request->validate([
            'email' => 'required|min:4|max:100',
            'password' => 'required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'
        ]);

      $contact = new Contact();
      $contact->email = $request->input('email');
      $contact->password = $request->input('password');
      $contact->save();

      return redirect()->route('check');
    }
}
