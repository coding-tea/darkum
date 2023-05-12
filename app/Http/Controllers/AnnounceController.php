<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAnnounceRequest;
use App\Http\Requests\UpdateAnnounceRequest;
use App\Models\Datas;
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
            'city' => $request->city,
            'userId' => Auth()->id()
        ]);

        //announceimage
        if($request->hasFile('image')){
            foreach($request->file('image') as $key => $image)
            {
                $ImageName = time().'.'.$image->extension();
                $image->storeAs('images', $ImageName);
                Media::create([
                    'url' => $ImageName,
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

    //Get All Annconce BY TYPE

    public function allAnnonces(Request $req)
    {
        $path = $req->path();
        if ($path == "location") {
            $announces = Announce::where("typeL", 'location')->with('medias')->get();
            $types = 'location';
        } else if ($path == "vente") {
            $announces = Announce::where("typeL", 'vente')->with('medias')->get();
            $types = 'vente';
        } else if ($path == "vacance") {
            $announces = Announce::where("typeL", 'vacance')->with('medias')->get();
            $types = 'vacances';
        }
        return view('pages.landing_page.location', compact("announces", 'path'));
    }

    public function filterSearch(Request $request)
  {
    // get the type of route (location | vente | vacance)
    $path = $request->path();
    
    //get all ville to fill the region select 
    $villes = DB::table('announces')->distinct()->pluck('city');
    //type de bien selectionner par user (Appartement | Maison | Villas ...)
    $typesBien = $request->input('typeBien');
    // la ville rechercher  selectionner par user
    $ville = $request->regionFilter;
    // le buget minimal et maximal selectionner par le user :
    $minBudget = $request->budgetMin;
    $maxBudget = $request->budgetMax;
    // get all annonces by type of route (location | vente | vacance)
    $announces = Announce::where("typeL", $path)->with('medias');

    //get  annonces filtred by type de bien (Appartement | Maison | Villas ...):

    if(!empty($typesBien)){
      $announces = Announce::where("typeL", $path)->wherein("type", $typesBien);

    // get les annonces filtrer by ville selectionner par user:
    if(!empty($ville)){
      $announces = Announce::where("city", "like", "%".$ville."%");
    }

    // get les annonces filtrer by budget selectionner par user:
    if(!empty($minBudget) || !empty($maxBudget)){
      $announces = Announce::whereBetween("price", [$minBudget, $maxBudget]);
    }


    $announces = $announces->with('medias')->get();
  }

  
    return view("pages.landing_page.location", compact("announces", 'path', "villes"));
  }
  
}






