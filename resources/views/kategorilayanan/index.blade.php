@extends('layout/aplikasi')

@section('konten')
<a href="{{ route('kategori-layanan.create') }}" class="btn btn-primary mb-3">+Tambah Data</a>
<table class="table table-bordered">
    <thead>
        <tr class="text-center">
            <th>Kode Kategori</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr class="text-center">
            <td>{{ $item->kode }}</td>
            <td>{{ $item->nama }}</td>
            <td>
                <a class='btn btn-secondary btn-sm' href='{{ route('kategori-layanan.show', $item->id) }}'>Detail</a>
                <a class='btn btn-warning btn-sm' href='{{ route('kategori-layanan.edit', $item->id) }}'>Edit</a>
                <form onsubmit="return confirm('Hapus data?')" class='d-inline' action="{{ route('kategori-layanan.destroy', $item->id) }}" method='post'>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $data->appends($_GET)->links() }}
@endsection
