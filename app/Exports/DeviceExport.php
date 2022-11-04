<?php

namespace App\Exports;

use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Device;


class DeviceExport implements FromView
{
    public function view(): View
    {
        return view('content.pages.devices-export', [
            'devices' => Device::all()
        ]);
    }
}
