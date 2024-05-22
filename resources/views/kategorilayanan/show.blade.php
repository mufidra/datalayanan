@extends('layout/aplikasi')

@section('konten')
    <div>
        <a href='{{ route('kategori-layanan.index') }}' class="btn btn-secondary"> << Kembali </a>
        <p>
            <b>Kode Kategori</b> {{ $data->kode}}
        </p>
        <p>
            <b>Nama Kategori</b> {{ $data->nama}}
        </p>
    </div>

@endsection
