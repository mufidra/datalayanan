<?php

namespace App\Http\Controllers;

use App\Models\KategoriLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = KategoriLayanan::orderBy('kode', 'asc')->paginate(4);
        return view('kategorilayanan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategorilayanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'kode'  => 'required|numeric|unique:kategori_layanans',
            'nama'  => 'required',
        ],
        [
            'kode.required' => 'Kode Kategori Wajib Diisi',
            'kode.numeric'  => 'Kode Kategori Wajib Diisi Dalam Format Angka',
            'kode.unique'   => 'Kode Kategori Sudah Pernah Digunakan, Silahkan Pilih Kode Yang Lain',
            'nama.required' => 'Nama Kategori Wajib Diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        KategoriLayanan::create([
            'kode'  => $request->kode,
            'nama'  => $request->nama,
        ]);

        return redirect()->route('kategori-layanan.index')->with('success', 'Berhasil Memasukkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = KategoriLayanan::find($id);

        return view('kategorilayanan.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = KategoriLayanan::find($id);

        return view('kategorilayanan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),
        [
            'nama'  => 'required',
        ],
        [
            'nama.required' => 'Nama Kategori Wajib Diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $kategori = KategoriLayanan::find($id);
        $kategori->update([
            'nama'  => $request->nama,
        ]);

        return redirect()->route('kategori-layanan.index')->with('success', 'Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        KategoriLayanan::find($id)->delete();
        return redirect()->route('kategori-layanan.index')->with('success', 'Berhasil Hapus Data');
    }
}
