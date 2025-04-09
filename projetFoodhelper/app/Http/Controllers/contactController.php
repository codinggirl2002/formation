<?php

namespace App\Http\Controllers;

use App\Mail\contactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class contactController extends Controller
{
    public function contact(){
        return view('others.contact');
    }

    public function envoyer(Request $request){
        $validate = Validator::make([
            "nom" => $request->input('nom'),
            "email" => $request->input('email'),
            "message" => $request->input('message'),
        ],
        [
            "nom" =>"required|min:3|max:20|string",
            "email" =>"required|email",
            "message" =>"required|min:18|string",
        ]);

        $datas = $validate->validated();

        Mail::to(env("MAIL_FROM_ADDRESS"))->send(new contactMail($datas));

        return redirect()->route('contact')->with("success", "votre message a bien ete envoye!");
    }
}
