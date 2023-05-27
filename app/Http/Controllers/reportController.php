<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class reportController extends Controller
{
    public function store(Request $req){
        Report::create([
            'type' => $req->type,
            'announce_id' => $req->announce_id,
        ]);

        return redirect()->back();
    }
}
