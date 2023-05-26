<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Announce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class favorisController extends Controller
{
  public function index()
  {

      $announcesId = DB::table('favorits')->select('AnnounceId')->where('userId', auth()->id())->get()->toArray();
      $announces = [];
      foreach($announcesId as $key => $id){
          $announce = Announce::find($id->AnnounceId)->toArray();
          array_push($announces, $announce);
      }
      return view("pages.admin.annonces.favorit", compact('announces'));
      // $favorit = DB::table('announces')->
  }

  public function add(Request $request)
  {
      DB::table('favorits')->insert([
          'AnnounceId' => $request->AnnounceId,
          'userId' => auth()->id()
      ]);

      return redirect()->back();
  }

  public function remove($AnnounceId)
  {
      DB::table('favorits')->where('AnnounceId', $AnnounceId)->delete();
      return redirect()->route('favoris.index')->with([
        "message" => "Deleted successfully"
      ]);
  }
}
