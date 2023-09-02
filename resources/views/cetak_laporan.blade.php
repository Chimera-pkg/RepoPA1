<!DOCTYPE html>
<html>

<head>
    <title>Cetak Laporan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

        p {
            font-size: 12px;
            margin-top: 2rem;
        }
    </style>
    <center>
        <h4>Laporan Barang</h4>
    </center>
    <p class="mt-2">Periode
        <br>Awal : {{$awal}}
        <br>Akhir : {{$akhir}}
    </p>
    <table class='table table-bordered mt-3'>
        <thead>
            <tr style="text-align: center;">
                <th rowspan="2">No</th>
                <th rowspan="2">Kode Barang</th>
                <th rowspan="2">Nama Barang</th>
                <th rowspan="2">Stok Awal</th>
                <th rowspan="2">Harga Barang</th>
                <th colspan="2">Mutasi</th>
                <th rowspan="2">Stok Akhir</th>
            </tr>
            <tr>
                <th>Masuk</th>
                <th>Keluar</th>
            </tr>
        </thead>
        <tbody>
            @if(count($data) == null)
            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            @else
            @php $x=1 @endphp
            @foreach($data as $data) <tr style="text-align: center;">
                <td>{{$x++}}</td>
                <td>{{$data->id_barang}}</td>
                <td>{{$data->nama_barang}}</td>
                <td>{{$data->stok_barang + $data->masuk - $data->keluar}}</td>
                <td>{{$data->harga_satuan}}</td>
                <td>{{$data->masuk}}</td>
                <td>{{$data->keluar}}</td>
                <td>{{$data->stok_barang}}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>

</body>

</html>