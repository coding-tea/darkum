<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatriceController extends Controller
{
    public function index($result = null){
      return view("calculatrice",compact("result"));
    }
    public function calculer(Request $req){
      $result = 0;
    $operation = $req->op;
    switch ($operation) {
      case '+':
        $result = $req->op1 + $req->op2;
        break;
      case '-':
        $result = $req->op1 - $req->op2;
        break;
      
      default:
        return;
        break;
    }
    return redirect()->route("home", compact("result"))->withInput();
    }
}
