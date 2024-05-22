@extends('layout.aplikasi')

@section('konten')
<a href='{{ route('kategori-layanan.index') }}' class="btn btn-secondary"> >>Kembali</a>
<form method="post" action="{{ route('kategori-layanan.update', $data->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <h1>Kode Kategori: {{ $data->kode }}</h1>
    </div>

    <div class="mb-3">
        <label for="nama" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control" name='nama' id="nama" value="{{ $data->nama }}" required>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">UPDATE</button>
    </div>
</form>
@endsection
