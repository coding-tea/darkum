<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Announce;
use App\Models\Comment;
use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnnoncesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $annonces = Announce::paginate(10);
      return view('pages.admin.annonces.index', compact('annonces'));
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
      return view('pages.admin.annonces.create', compact('typeL', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'title' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'nbRome' => 'required|numeric',
        'surface' => 'required|numeric',
        'type' => 'required|in:Appartement, Maison, Villa, Chambres, Terrains, Fermes',
        'typeL' => 'required|in:location,vente,vacance',
        'adresse' => 'required',
        'adresse' => 'required',
        'image.*' => 'required|mimes:jpeg,png,gif,mp4,avi,mov'
      ]);
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
  
      return redirect()->route('annonces.index')->with([
        'msg' => "Annonces Created successfully",
        'alert' => 'alert-info'
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
      $annonces = Announce::find($id);
      $email = $annonces->user->email;
      $comments = $annonces->comments;
      // dd($comments->userId);
      // $name = User::select("name")->find($comments->userId);
      $announce_id = $id;
      $medias= $annonces->medias;
      return view('pages.admin.annonces.show', compact('annonces', 'email', 'announce_id', 'comments', 'medias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $typeL = ["location", "vacance", "vente"];
      $type = ['Appartement', 'Maison', 'Villa', 'Chambres', 'Terrains', 'Fermes'];
      $announce = Announce::find($id);
      return view('pages.admin.annonces.edit', compact('announce', 'typeL', 'type'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $announce = Announce::find($id);
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
      return redirect()->route('annonces.index')->with([
        'msg' => "updated successfully",
        'alert' => 'alert-success'
      ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $medias = Media::where("idAnnounce", $id);
      $medias->delete();
      $announce = Announce::find($id);
      $announce->delete();
      return redirect()->route('annonces.index')->with([
        'msg' => "Deleted successfully",
        'alert' => 'alert-danger'
      ]);
    }
}
