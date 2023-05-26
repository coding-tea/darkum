<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Announce;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnnounceController extends Controller
{
  public function show(Announce $announce)
  {
    $data = null;
    $email = '';
    if (auth()->check()) {
      $email = Auth::user()->email;
    }
    $data = DB::table('datas')->where('userId', $announce->userId)->limit(1)->get()->toArray();
    $data = (!empty($data)) ? $data[0] : [];
    $announce_id = $announce->id;
    $comments = DB::table('comments')->where('AnnounceId', $announce_id)->get()->toArray();
    $names = [];
    foreach ($comments as $comment) {
      $name = User::find($comment->userId)->name;
      array_push($names, $name);
    }
    $medias = DB::table('medias')->where('idAnnounce', $announce_id)->get()->toArray();
    $author = DB::table('users')->where('id', $announce->userId)->limit(1)->get()->toArray()[0]->email;

    $announces = Announce::where('typeL', $announce->typeL)->limit(4)->with('medias')->get()->toArray();

    return view('pages.user.announces.show', compact('announce', 'data', 'email', 'announce_id', 'comments', 'names', 'medias', 'announces', 'author'));
  }
}
