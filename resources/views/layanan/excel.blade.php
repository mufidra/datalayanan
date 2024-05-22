<table>
    <thead>
        <tr>
            <th style="text-align: center;">Kode layanan</th>
            <th style="text-align: center;">Nama layanan</th>
            <th style="text-align: center;">Deskripsi</th>
            <th style="text-align: center;">Biaya layanan</th>
            <th style="text-align: center;">Durasi layanan</th>
            <th style="text-align: center;">Kategori layanan</th>
            <th style="text-align: center;">Created at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)
            <tr>
                <td style="text-align: center;">{{ $row->kode_layanan }}</td>
                <td style="text-align: center;">{{ $row->nama_layanan }}</td>
                <td style="text-align: center;">{{ $row->deskripsi }}</td>
                <td style="text-align: center;">{{ $row->biaya_layanan }}</td>
                <td style="text-align: center;">{{ $row->durasi_layanan }}</td>
                <td style="text-align: center;">{{ $row->kategori->nama }}</td>
                <td style="text-align: center;">{{ \Carbon\Carbon::parse($row->created_at)->format('Y-m-d H:i:s') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
