<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use App\Models\Favorit as ModelsFavorit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class favorit extends Controller
{
    public function index()
    {

        $announcesId = DB::table('favorits')->select('AnnounceId')->where('userId', auth()->id())->get()->toArray();
        $announces = [];
        foreach($announcesId as $key => $id){
            $announce = Announce::find($id->AnnounceId)->toArray();
            array_push($announces, $announce);
        }
        return view("pages.user.announces.favorit", compact('announces'));
        // $favorit = DB::table('announces')->
    }

    public function add(Request $request)
    {
        ModelsFavorit::create([
            'AnnounceId' => $request->AnnounceId,
            'userId' => auth()->id()
        ]);

        return redirect()->back();
    }

    public function remove($AnnounceId)
    {
        DB::table('favorits')->where('AnnounceId', $AnnounceId)->delete();
        return redirect()->route('favorit.index');
    }
}
