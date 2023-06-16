<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Announce;
use App\Models\Media;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

use function PHPUnit\Framework\returnSelf;

class ReportController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // dd(Report::where("etat","1"));
    $reportToRead = Report::where("etat", "0");
    $reportToRead->update([
      'etat' => "1"
    ]);

    $reports = Report::selectRaw("announce_id, count(announce_id) as nbAnnonces")->groupBy("announce_id")->orderBy("etat")->orderBy("nbAnnonces", "desc")->get();
    $arrays =  [];
    foreach ($reports as  $key => $report) {
      array_push($arrays, Report::where("announce_id", $report->announce_id)->get());
    }


    return view('pages.admin.reports.index', compact('reports', 'arrays'));
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
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update($id)
  {
    $report = DB::table('reports')->where("announce_id", $id)->update([
      "etat" => '2'
    ]);
    if ($report)
      return redirect()->route("reports.index")->with(["msg" => "Report Validate"]);
    else
      return redirect()->route("reports.index")->with(["error" => "Report blocked"]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Media::where('idAnnounce', $id)->delete();
    DB::table('favorits')->where('AnnounceId', $id)->delete();
    Report::where('announce_id', $id)->delete();
    Announce::destroy($id);
    return redirect()->route('reports.index')->with('msg', 'announcement deleted successfuly');
  }
}
