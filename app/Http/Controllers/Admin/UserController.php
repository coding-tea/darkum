<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request; 

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('pages.admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $roles = Role::pluck('title', 'id');

        return view('pages.admin.users.create');
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
        'name' => 'required|string|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'roles' => 'required|in:user,admin',
      ]);
      
      
      $password = Hash::make($request->password);
      User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $password,
        'roles' => $request->roles,
    ]);      
        return redirect()->route('users.index')->with([
            'message' => 'successfully created !',
            'alert' => 'alert-success'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {

      $request->validate([
        'roles' => 'required|in:user,admin',
      ]);
      $user->update([
        'role' => $request->roles
      ]);
      $newRole = $user->role == "admin" ? 'user' : "admin";
      $message = 'Successfully updated the role of : <strong>' . strtoupper($user->name) . '</strong> from ' . $user->role . ' to ' . $newRole;
      return redirect()->route('users.index')->with([
            'msg' => $message,
            'alert' => 'alert-info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with([
            'msg' => 'successfully deleted !',
            'alert' => 'alert-danger'
        ]);
    }

     /**
     * Delete all selected Permission at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
