<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  public function index()
  {
    if (Auth::check()) {
      // User is authenticated
      $user = Auth::user();

      if ($user->role === 'admin') {
        return view('pages.admin.dashboard');
      } else {
        return view('pages.user.index');

      }
    } else {
      return redirect()->back();
    }
  }
}
