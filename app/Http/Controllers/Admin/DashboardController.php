<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

class DashboardController extends Controller
{
  public function index()
  {
    if (Auth::check()) {
      // User is authenticated
      $user = Auth::user();

      if ($user->role === 'admin') {
        $nbUsers = User::count();
        return view('pages.admin.dashboard', compact("nbUsers"));
      } else {
        return view('pages.user.index');

      }
    } else {
      return redirect()->back();
    }
  }
}
