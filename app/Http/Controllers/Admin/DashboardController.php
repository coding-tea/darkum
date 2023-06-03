<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announce;
use App\Models\Comment;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  public function index()
  {
    if (Auth::check()) {
      // User is authenticated
      $user = Auth::user();

      if ($user->role === 'admin') {
        $nbUsers = User::count();
        $nbAnnonces = Announce::count();
        $nbCom = Comment::count();
        $nbReports = Report::count();
        $newReports = DB::table('reports')->where('etat', '0')->count();
        return view('pages.admin.dashboard', compact("nbUsers", "nbAnnonces","nbCom", "nbReports", "newReports"));
      } else {
        return view('pages.user.index');

      }
    } else {
      return redirect()->back();
    }
  }
}
