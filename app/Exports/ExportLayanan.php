<?php

namespace App\Exports;

use App\Models\layanan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportLayanan implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('layanan.excel', [
            'data' => layanan::all()
        ]);
    }
}
