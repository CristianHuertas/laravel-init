<?php

namespace App\Http\Controllers\pages;

use App\Exports\DeviceExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Type;
use App\Models\So;
use Illuminate\Support\Facades\Storage;
use App\Mail\ExampleMail;
use App\Mail\UpdateDevice;
use App\Mail\DeleteDevice;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class Devices extends Controller
{
  public function index()
  {
    $device = Device::all();
    $type = Type::all();

    //dd($type);
    return view('content.pages.devices', ['devices' => $device, 'type' => $type]);
  }

  public function create()
  {
    $sos = So::where('active', true)->get();
    $types = Type::where('active', true)->get();

    return view('content.pages.devices-create', ['sos' => $sos, 'types' => $types]);
  }

  public function store(Request $request)
  {
    //dd($request);
    $validator = $request->validate([
      'name' => 'required'
    ]);


    $devices = new Device();

    if ($request->hasFile('fileLogo')) {
      $file = $request->file('fileLogo');
      $name = time() . $file->getClientOriginalName();
      $filePath = 'public/' . $name;
      Storage::put($filePath, file_get_contents($file));

      $url = Storage::url($filePath);
      $devices->image_url = $url;
    }

    $devices->tipe_id = $request->type_id;
    $devices->sos_id = $request->sos_id;
    $devices->name = $request->name;
    $devices->description = $request->description ?? null;
    $devices->serial_number = $request->serial_number ?? null;
    $devices->mac_address = $request->mac_address ?? null;
    $devices->ip_address = $request->ip_address ?? null;
    $devices->model = $request->model ?? null;
    $devices->manufacturer = $request->manufacturer ?? null;
    $devices->firmware = $request->firmware ?? null;
    $devices->stock = $request->stock ?? null;
    $devices->hdd = $request->hdd ?? null;
    $devices->ram = $request->ram ?? null;
    $devices->cpu = $request->cpu ?? null;
    $devices->gpu = $request->gpu ?? null;
    $devices->total_slots = $request->total_slots ?? null;
    $devices->history = $request->history ?? null;
    $devices->save();

    //Mandar Mail
    Mail::to('cristian.huertas0@gmail.com')->send(new ExampleMail($devices));



    return redirect()->route('pages-devices');
  }

  public function show($device_id)
  {
    $devices = Device::find($device_id);
    $type_id = $devices->tipe_id;
    $types = Type::find($type_id);

    $sos_id = $devices->sos_id;
    $sos_encontrado = So::find($sos_id);

    $sos = So::where('active', true)->get();
    $types_activos = Type::where('active', true)->get();

    //dd($types_activos);
    //dd($sos);


    return view('content.pages.devices-show', ['devices' => $devices, 'types_activos' => $types_activos, 'types' => $types, 'sos' => $sos, 'sos_encontrado' => $sos_encontrado]);
  }

  public function update(Request $request)
  {
    //dd( $request);

    $devices = Device::find($request->devices_id);

    if ($request->hasFile('fileLogo')) {
      $file = $request->file('fileLogo');
      $name = time() . $file->getClientOriginalName();
      $filePath = 'public/' . $name;
      Storage::put($filePath, file_get_contents($file));

      $url = Storage::url($filePath);
      $devices->image_url = $url;
    }

    $devices->tipe_id = $request->type_id;
    $devices->sos_id = $request->sos_id;
    $devices->name = $request->name;
    $devices->description = $request->description ?? null;
    $devices->serial_number = $request->serial_number ?? null;
    $devices->mac_address = $request->mac_address ?? null;
    $devices->ip_address = $request->ip_address ?? null;
    $devices->model = $request->model ?? null;
    $devices->manufacturer = $request->manufacturer ?? null;
    $devices->firmware = $request->firmware ?? null;
    $devices->stock = $request->stock ?? null;
    $devices->hdd = $request->hdd ?? null;
    $devices->ram = $request->ram ?? null;
    $devices->cpu = $request->cpu ?? null;
    $devices->gpu = $request->gpu ?? null;
    $devices->total_slots = $request->total_slots ?? null;
    $devices->history = $request->history ?? null;
    $devices->save();

    //enviar email
    Mail::to('cristian.huertas0@gmail.com')->send(new UpdateDevice($devices));

    return redirect()->route('pages-devices');
  }

  public function destroy(Request $request)
  {
    $devices = Device::find($request->devices_id);
    $devices->delete();

    //enviar email
    Mail::to('cristian.huertas0@gmail.com')->send(new DeleteDevice($devices));
    return redirect()->route('pages-devices');
  }

  public function switch($devices_id)
  {
    $devices_id = Device::find($devices_id);
    $devices_id->active = !$devices_id->active;
    $devices_id->save();
    return redirect()->route('pages-devices');
  }


  public function export()
  {

    return Excel::download(new DeviceExport, 'dispositivos.xlsx');
    //return Excel::download(new DeviceExport, "dispositivos.xlsx");
  }
}
