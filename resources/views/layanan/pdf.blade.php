<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>

    <title>Data Layanan</title>
</head>
<body>
    <table class="table table-bordered">
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
</body>
</html>
