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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        'message' => "updated successfully",
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
        'message' => "Deleted successfully",
        'alert' => 'alert-danger'
      ]);
    }
}
