<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Inscription extends Controller
{
    public function index(){
      return view('inscription');
    }
    public function afficher(Request $req){
      $data=[];
      $data["nom"] = $req->nomC;
      $data["email"] = $req->email;
      $data["tel"] = $req->tel;
      return view("aficher",["data" => $data]);
    }
}
