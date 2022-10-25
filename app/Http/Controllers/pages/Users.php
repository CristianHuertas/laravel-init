<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\hash;
use League\Flysystem\UrlGeneration\PublicUrlGenerator;

class Users extends Controller
{
  public function index()
  {
    $users = User::all();
    return view('content.pages.users', ['users' => $users]);
  }

  public function create()
  {
    return view('content.pages.users-create');
  }

  public function store(Request $request)
  {
    $validator = $request->validate([
      'name'=> 'required',
      'email'=> 'required',
      'password'=> 'required'
    ]);
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = hash::make($request->password);
    $user->save();

    return redirect()->route('pages-users');
  }

  public function show($user_id)
  {
    $user = User::find($user_id);
    return view('content.pages.users-show', ['user' => $user]);
  }

  public function update(Request $request)
  {
    $user = User::find($request->user_id);
    $user->name = $request->name;
    $user->email = $request->email;

    //if (Hash::make($request->old_password == $user->password))
    if (hash::make($request->old_password == $user->password)) {
      if (hash::make($request->new_password_2 == $request->new_password)) {
        $user->password = hash::make($request->new_password_2);
      } else {
        dd('ERROR! las nuevas claves no coinden');
      }
    } else {
      dd('ERROR! Clave actual incorrecta');
    }
    $user->save();
    return redirect()->route('pages-users');
  }

  public function destroy(Request $request)
  {
    $user = User::find($request->user_id);
    $user->delete();
    return redirect()->route('pages-users');
  }
}
