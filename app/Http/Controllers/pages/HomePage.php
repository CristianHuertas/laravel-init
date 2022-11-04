<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Type;
use App\Models\So;
use App\Models\Backup;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomePage extends Controller
{
  public function index()
  {
    $user = Auth::user();
    $roleifexist = DB::table('model_has_roles')->where('model_id', $user->id)->first();
    if (!$roleifexist) {
      DB::table('model_has_roles')->insert([
        'role_id' => 1,
        'model_type' => 'App\Models\User',
        'model_id' => $user->id
      ]);
    }


    $sos = So::where('active', true)->count();
    $Type = Type::where('active', true)->count();
    $Device = Device::where('active', true)->count();
    $Backup = Backup::where('status', 'done')->count();

    
    return view('content.pages.pages-home', [ 'n_sos'=> $sos ,  'n_type'=> $Type, 'n_device'=> $Device, 'n_backup'=> $Backup]);
  }
}
