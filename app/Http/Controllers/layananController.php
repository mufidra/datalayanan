<?php

namespace App\Http\Controllers;

use App\Exports\ExportLayanan;
use App\Http\Controllers\Controller;
use App\Models\KategoriLayanan;
use App\Models\layanan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class layananController extends Controller
{
    function index()
    {
        $data = layanan::orderBy('kode_layanan', 'asc')->paginate(4);
        return view('layanan/index')->with('data', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = layanan::where('kode_layanan', $id)->first();
        return view('layanan/show')->with('data', $data);
    }

    public function create()
    {
        $kategori = KategoriLayanan::all();
        return view('layanan/create', compact('kategori'));
    }

    public function store(Request $request)
    {
    $request->validate([
        'kode_layanan' => 'required|numeric|unique:layanan',
        'nama_layanan' => 'required',
        'deskripsi' => 'required',
        'biaya_layanan' => 'required',
        'durasi_layanan' => 'required',
        'kategori_layanan' => 'required',
        'created_at' => 'required|date_format:Y-m-d H:i:s',
    ], [
        'kode_layanan.required'=>'Kode layanan Wajib Diisi',
        'kode_layanan.numeric'=>'Kode layanan Wajib Diisi Dalam Format Angka',
        'kode_layanan.unique' => 'Kode layanan Sudah Pernah Digunakan, Silahkan Pilih Kode Yang Lain',
        'nama_layanan.required'=>'Nama layanan Wajib Diisi',
        'deskripsi.required'=>'Deskripsi Wajib Diisi',
        'biaya_layanan.required'=>'Biaya layanan Wajib Diisi',
        'durasi_layanan.required'=>'Durasi layanan Wajib Diisi',
        'kategori_layanan.required'=>'Kategori layanan Wajib Diisi',
    ]);

    $data = [
        'kode_layanan' => $request->input('kode_layanan'),
        'nama_layanan' => $request->input('nama_layanan'),
        'deskripsi' => $request->input('deskripsi'),
        'biaya_layanan' => $request->input('biaya_layanan'),
        'durasi_layanan' => $request->input('durasi_layanan'),
        'kategori_layanan' => $request->input('kategori_layanan'),
        'created_at' => $request->input('created_at'),
    ];

    layanan::create($data);
    return redirect('layanan')->with('success', 'Berhasil Memasukkan Data');
    }

    public function edit(string $id)
    {
        $data = layanan::where('kode_layanan', $id)->first();
        $kategori = KategoriLayanan::all();
        return view('layanan/edit', compact('data', 'kategori'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'deskripsi' => 'required',
            'biaya_layanan' => 'required',
            'durasi_layanan' => 'required',
            'kategori_layanan' => 'required',
            'created_at' => 'required|date_format:Y-m-d H:i:s',
        ], [
            'kode_layanan.numeric'=>'Kode layanan Wajib Diisi Dalam Format Angka ',
            'nama_layanan.required'=>'Nama layanan Wajib Diisi',
            'deskripsi.required'=>'Deskripsi Wajib Diisi',
            'biaya_layanan.required'=>'Biaya layanan Wajib Diisi',
            'durasi_layanan.required'=>'Durasi layanan Wajib Diisi',
            'kategori_layanan.required'=>'Kategori layanan Wajib Diisi',
        ]);
        $data = [
            'nama_layanan'=> $request->input('nama_layanan'),
            'deskripsi'=> $request->input('deskripsi'),
            'biaya_layanan'=> $request->input('biaya_layanan'),
            'durasi_layanan'=> $request->input('durasi_layanan'),
            'kategori_layanan'=> $request->input('kategori_layanan'),
        ];
        layanan::where('kode_layanan', $id)->update($data);
        return redirect('/layanan')->with('success', 'Berhasil Melakukan Update Data');
    }

    public function destroy(string $id)
    {
        layanan::where('kode_layanan', $id)->delete();
        return redirect('/layanan')->with('success', 'Berhasil Hapus Data');
    }

    public function excel()
    {
        return Excel::download(new ExportLayanan, 'Layanan.xlsx');
    }

    public function pdf()
    {
        $data = layanan::all();
        $pdf = Pdf::loadView('layanan.pdf', ['data' => $data]);
        return $pdf->stream('Layanan.pdf');
    }
}
