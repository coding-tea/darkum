<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAnnounceRequest;
use App\Http\Requests\UpdateAnnounceRequest;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AnnounceController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $announces = Announce::all();
    return view('pages.user.announces.index', compact('announces'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.user.announces.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreAnnounceRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreAnnounceRequest $request)
  {
    $announce = Announce::create([
      'title' => $request->title,
      'description' => $request->description,
      'price' => $request->price,
      'nbRome' => $request->nbRome,
      'surface' => $request->surface,
      'city' => $request->city
    ]);
    $files = $request->image;
    dd($files);
    $uploaded = [];
    if (isset($files)) {
      foreach ($files as $file) {
        $uploaded[] = Storage::put('images/' . $file, file_get_contents($file->getRealPath()));
        Media::create([
          'url' => $file,
          'idAnnounce' => $announce->id
        ]);
      }
    }
    return redirect()->route('announces.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Announce  $announce
   * @return \Illuminate\Http\Response
   */
  public function show(Announce $announce)
  {
    $id = Auth::user()->id;
    $email = Auth::user()->email;
    $announce_id = $announce->id;
    $data = DB::table('datas')->where('userId', $id)->limit(1)->get()->toArray();
    $data = (!empty($data)) ? $data[0] : [];
    $comments = DB::table('comments')->where('userId', $id)->get()->toArray();
    // dd($comments);
    return view('pages.user.announces.show', compact('announce', 'data', 'email', 'announce_id', 'comments'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Announce  $announce
   * @return \Illuminate\Http\Response
   */
  public function edit(Announce $announce)
  {
    return view('pages.user.announces.edit', compact('announce'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateAnnounceRequest  $request
   * @param  \App\Models\Announce  $announce
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateAnnounceRequest $request, Announce $announce)
  {
    $announce->update([
      'title' => $request->title,
      'description' => $request->description,
      'price' => $request->price,
      'nbRome' => $request->nbRome,
      'surface' => $request->surface,
      'city' => $request->city
    ]);
    return redirect()->route('announces.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Announce  $announce
   * @return \Illuminate\Http\Response
   */
  public function destroy(Announce $announce)
  {
    $announce->delete();
    return redirect()->route('announces.index');
  }



  // Get All annonce By TypeL ["Location", "Vente",  "Vacance"]

  public function allAnnonces(Request $req)
  {
    $villes = DB::table('announces')->distinct()->pluck('city');
    if ($req->is("location")) {
      $announces = Announce::where("typeL", 'location')->with('medias')->get();
      $typesL = 'location';
    } else if ($req->is("vente")) {
      $announces = Announce::where("typeL", 'vente')->with('medias')->get();
      $typesL = 'vente';
    } else if ($req->is("vacance")) {
      $announces = Announce::where("typeL", 'vacance')->with('medias')->get();
      $typesL = 'vacances';
    }
    return view('pages.landing_page.location', compact("announces", 'typesL', "villes"));
  }

  // Filter La recherche :

  public function filterSearch(Request $request)
  {
    $villes = DB::table('announces')->distinct()->pluck('city');
    $typesL = $request->path();
    $typesBien = $request->input('typeBien');
    $ville = $request->regionFilter;
    $announces = Announce::where("typeL", $typesL)->with('medias');

    //get les annonces filtrer by type de bien :

    if(!empty($typesBien)){
      $announces = Announce::where("typeL", $typesL)->wherein("type", $typesBien);

    // get les annonces filtrer by location :
    if(!empty($ville)){
      $announces = Announce::where("city", "like", "%".$ville."%");
    }
    $announces = $announces->with('medias')->get();
  }
    return view("pages.landing_page.location", compact("announces", 'typesL', "villes"));
  }
}
