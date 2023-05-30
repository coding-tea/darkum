<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Datas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class profilController extends Controller
{
  public function index(User $user)
  {
    $id = Auth::user()->id;
    $user = User::find($id);
    // $data = DB::table('datas')->where('userId', $id)->limit(1)->get()->toArray();
    $data = $user->data;
    $data = (!empty($data)) ? $data : [];
    return view('pages.admin.profile.index', compact('user', 'data'));
  }

  public function update(Request $request, User $user)
  {

    $request->validate([
      'email' => [
        'required',
        Rule::unique('users')->ignore(auth()->user()->id),
      ],
      'fullName' => [
        'required',
        Rule::unique('datas')->ignore(auth()->user()->id),
        'regex:/^[a-zA-Z\s]+$/'
      ],
      'name' => [
        'required',
        Rule::unique('users')->ignore(auth()->user()->id),
        'regex:/^[a-zA-Z0-9_\.\-\s]+$/'
      ],
      'tel' => [
        'required',
        Rule::unique('datas')->ignore(auth()->user()->id),
        'numeric',
      ],
      'adresse' => 'required|regex:/^[a-zA-Z0-9_\.\-\s]+$/',
    ]);

    $id = Auth::user()->id;
    $user = User::find(Auth::user()->id);
    $data = $user->data;
    if ($data != null) {
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
    } else {
      $user->update([
        "name" => $request->name,
        "email" => $request->email
      ]);
      Datas::updateOrInsert([
        "userId" => $id
      ], [
        "fullName" => $request->fullName,
        "adresse" => $request->adresse,
        "tel" => $request->tel,
      ]);
    }
    return redirect()->route('profileAdmin')->with([
      'msg' => "update successfully"
    ]);
  }
}
