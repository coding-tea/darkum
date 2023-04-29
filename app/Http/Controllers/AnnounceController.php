<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAnnounceRequest;
use App\Http\Requests\UpdateAnnounceRequest;
use App\Models\Media;
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
        $files = $request->file("images");
        $uploaded = [];
        if(isset($files)){
            foreach($files as $file) {
                $name = time() . '.' . $file->getClientOriginalExtension();
                $uploaded[] = Storage::put('images/'. $name , file_get_contents($file->getRealPath()));
                Media::create([
                    'url' => $name,
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
        $data = DB::table('datas')->where('userId', $id)->limit(1)->get()->toArray();
        $data = (!empty($data)) ? $data[0] : [];
        return view('pages.user.announces.show', compact('announce', 'data', 'email'));
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
}
