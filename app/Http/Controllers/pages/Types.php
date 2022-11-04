<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use Illuminate\Support\Facades\hash;
use League\Flysystem\UrlGeneration\PublicUrlGenerator;

class Types extends Controller
{
  public function index()
  {
    $types = Type::all();
    return view('content.pages.types', ['types' => $types]);
  }

  public function create()
  {
    return view('content.pages.types-create');
  }

  public function store(Request $request)
  {
    //dd($request);
    $validator = $request->validate([
      'name' => 'required',
      'description' => 'required'
    ]);
    $types = new Type();
    $types->name = $request->name;
    $types->description = $request->description;
    $types->icon = $request->icon;
    $types->save();

    return redirect()->route('pages-types');
  }

  public function show($type_id)
  {
    $types = Type::find($type_id);
    return view('content.pages.types-show', ['types' => $types]);
  }

  public function update(Request $request)
  {
    //dd($request);
    $type = Type::find($request->type_id);
    //dd( $type->active);

    $type->name = $request->name;
    $type->description = $request->description;
    $type->icon = $request->icon;
    //$type->active = $request->active;
    $type->save();
    return redirect()->route('pages-types');
  }

  public function destroy(Request $request)
  {
    $type = Type::find($request->type_id);
    $type->delete();
    return redirect()->route('pages-types');
  }

  public function switch($type_id)
  {
    $type = Type::find($type_id);
    $type->active = !$type->active;
    $type->save();
    return redirect()->route('pages-types');
  }
}
