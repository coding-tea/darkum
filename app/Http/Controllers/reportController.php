<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class reportController extends Controller
{
    public function store(Request $req){
        Report::create([
            'type' => $req->type,
            'announce_id' => $req->announce_id,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back();
    }
}
