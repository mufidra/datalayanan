@extends('layout.aplikasi')

@section('konten')
<form method="post" action="{{ route('kategori-layanan.store') }}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="mb-3">
        <label for="kode" class="form-label">Kode Kategori</label>
        <input type="text" class="form-control" name='kode' id="kode" value="{{ old('kode') }}" required>
    </div>

    <div class="mb-3">
        <label for="nama" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control" name='nama' id="nama" value="{{ old('nama') }}" required>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">SIMPAN</button>
    </div>
</form>
@endsection
