<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class profilController extends Controller
{
  public function index(User $user){
    $id = Auth::user()->id;
      $user =User::find($id);
      // $data = DB::table('datas')->where('userId', $id)->limit(1)->get()->toArray();
      $data = $user->data;
      $data = (!empty($data)) ? $data : [];
      return view('pages.admin.profile.index', compact('user', 'data'));
  }

  public function update(Request $request, User $user)
  {
      $id = Auth::user()->id;
      $user = User::find(Auth::user()->id);
      $data = $user->data;
      $user->update([
          "name" => $request->name,
          "email" => $request->email
      ]);
      $data->updateOrInsert([
          "userId" => $id
      ], [
          "fullName" => $request->fullName,
          "adresse" => $request->adresse,
          "tel" => $request->tel,
      ]);
      return redirect()->route('profileAdmin')->with([
        'message' => "update successfully"
      ]);
  }
}
