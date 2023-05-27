<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Datas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        $id = Auth::user()->id;
        $user = DB::table('users')->where('id', $id)->limit(1)->get()->toArray();
        $user = $user[0];
        $data = DB::table('datas')->where('userId', $id)->limit(1)->get()->toArray();
        $data = (!empty($data)) ? $data[0] : [];
        return view('pages.user.profile.index', compact('user', 'data'));
    }


    public function update(Request $request, User $user)
    {
        $id = Auth::user()->id;
        $user->update([
            "name" => $request->name,
            "email" => $request->email
        ]);
        DB::table('datas')->updateOrInsert([
            "userId" => $id
        ], [
            "fullName" => $request->fullName,
            "adresse" => $request->adresse,
            "tel" => $request->tel,
        ]);
        return redirect()->route('profile.index')->with('msg', 'your informations updated successfuly');
    }

}
