<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAnnounceRequest;
use App\Http\Requests\UpdateAnnounceRequest;
use App\Models\Datas;
use App\Models\Media;
use App\Models\User;
use App\Models\Favorit;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;

class AnnounceController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $announces = DB::table('announces')->where('userId', Auth()->id())->get()->toArray();
    return view('pages.user.announces.index', compact('announces'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $typeL = ['location', 'vacances', 'vente'];
    $type = ['Appartement', 'Maison', 'Villa', 'Chambres', 'Terrains', 'Fermes'];
    return view('pages.user.announces.create', compact('typeL', 'type'));
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
      'city' => $request->city,
      'type' => $request->type,
      'typeL' => $request->typeL,
      'adresse' => $request->adresse,
      'userId' => Auth()->id()
    ]);

    //announceimage
    if ($request->hasFile('image')) {
      foreach ($request->file('image') as $key => $image) {
        $ImageName = time() . $image->getClientOriginalName();
        $image->storeAs('images', $ImageName);
        Media::create([
          'url' => $ImageName,
          'idAnnounce' => $announce->id
        ]);
      }
    }

    return redirect()->route('announces.index')->with('msg', 'announcement added successfuly');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Announce  $announce
   * @return \Illuminate\Http\Response
   */
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

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Announce  $announce
   * @return \Illuminate\Http\Response
   */
  public function edit(Announce $announce)
  {
    $typeL = Announce::selectRaw('typeL')->distinct()->get();
    $type = Announce::selectRaw('type')->distinct()->get();
    return view('pages.user.announces.edit', compact('announce', 'typeL', 'type'));
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
      'city' => $request->city,
      'typeL' => $request->typeL,
      'type' => $request->type,
      'adresse' => $request->adresse
    ]);
    return redirect()->route('announces.index')->with('msg', 'announcement updated successfuly');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Announce  $announce
   * @return \Illuminate\Http\Response
   */
  public function destroy(Announce $announce)
  {
    Media::where('idAnnounce', $announce->id)->delete();
    DB::table('favorits')->where('AnnounceId', $announce->id)->delete();
    Report::where('announce_id', $announce->id)->delete();
    $announce->delete();
    return redirect()->route('announces.index')->with('msg', 'announcement deleted successfuly');
  }

    //Get All Annconce BY TYPE

    public function allAnnonces(Request $req)
    {
      $villes = DB::table('announces')->distinct()->pluck('city');
      $path = $req->path();
  
      $announces = Announce::where("typeL", $path)->with('medias')->get();
  
      $nbAnnonces = $announces->count();
  
      $budgetMin =  floor(intval(Announce::where("typeL", $path)->min("price") / 100)) * 100;
      $surfaceMin =  floor(intval(Announce::where("typeL", $path)->min("surface") / 100)) * 100;
      $path = ucfirst($path);
      $pageInfo = [
        'nbAnnonces' => $nbAnnonces,
        'path' => $path,
        'villes' => $villes,
        'budgetMin' => $budgetMin,
        'surfaceMin' => $surfaceMin
      ];
  
      return view('pages.landing_page.' . $path, compact("announces", "pageInfo"));
    }
  
    
  
    public function filterIndex(Request $request)
    {
      $path = $request->filter;
      $typeBien = $request->typeBien;
      $ville = $request->searchVille;
  
      $announces = Announce::where("typeL", $path);
      if ($typeBien == "all"){
        if(!empty($ville)){
          $announces->where("city", $ville);
        }
      }
      else
        $announces->where("city", $ville)->where("type", $typeBien);
  
  
  
      // calculer le nombre des annonces pour le afficher
      $nbAnnonces = $announces->count();
  
      // pour remplir  select de budget : 
      $budgetMin =  floor(intval(Announce::where("typeL", $path)->min("price") / 100)) * 100;
  
      // pour remplir  select de surface : 
      $surfaceMin =  floor(intval(Announce::where("typeL", $path)->min("surface") / 100)) * 100;
  
      //get les annonces avec leur photo.
      $announces = $announces->with('medias')->get();
  
      //get all ville to fill the region select 
      $villes = DB::table('announces')->distinct()->pluck('city');
  
      $path = ucfirst($path);
      $pageInfo = [
        'nbAnnonces' => $nbAnnonces,
        'path' => $path,
        'villes' => $villes,
        'budgetMin' => $budgetMin,
        'surfaceMin' => $surfaceMin
      ];
  
      $old_choices = [
        "ville" => $ville,
        'region' => $ville,
        "typeB" => $typeBien,
        "path" => strtolower($pageInfo['path'])
      ];
  
      return view("pages.landing_page.indexFilter", compact("announces", "pageInfo", "old_choices"));
    }
}
