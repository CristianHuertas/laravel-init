<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Type;
use App\Models\So;


class HomePage extends Controller
{
  public function index()
  {
    $sos = So::where('active', true)->count();
    $Type = Type::where('active', true)->count();
    $Device = Device::where('active', true)->count();


    
    return view('content.pages.pages-home', [ 'n_sos'=> $sos ,  'n_type'=> $Type, 'n_device'=> $Device]);
  }
}
