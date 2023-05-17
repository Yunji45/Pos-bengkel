<!DOCTYPE html>
<html>

<head>
    <title>Jurnal Umum</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 10pt;
        }
    </style>
</head>

<body>
    <table class="table table-bordered" width="100%" align="center">
        <tr align="center">
            <td>
                <h2>Laporan Jurnal<br>Fietsen Bouwer</h2>
                <hr>
            </td>
        </tr>
    </table>
    <table class="table table-bordered" width="100%" align="center">
        <thead>
            <tr>

                <th width="5%">Tanggal Transaksi</th>
                <th width="15%">Nama Akun/Perkiraan</th>
                <th width="5%">Debet</th>
                <th width="5%">Kredit</th>
            </tr>
        </thead>
        <tbody>
            @php
            $total_pembayaran1 = 0;
            $total_pembayaran2 = 0;
            @endphp
            @foreach ($laporan as $akn)
            @foreach ($laporan as $bb)
            <!-- pembuatan prulangan bersarang -->
            @if($loop->parent->first)
            <tr>
                <td>{{$bb->created_at}}</td>
                <td>{{$bb->kode_penjualan}} Kas</td>
                <td>{{number_format($bb->total_harga)}}</td>
                <td>0</td>
            </tr>
            <tr>
                <td>{{$bb->created_at}}</td>
                <td>{{$bb->kode_penjualan}} Penjualan {{$bb->type}}</td>
                <td>0</td>
                <td>{{number_format($bb->total_harga)}}</td>
            </tr>
            <!-- hitung total debet dan kredit -->
            {{$total_pembayaran1 += $bb->total_harga}};
            {{$total_pembayaran2 += $bb->total_harga}};
            @endif

            @endforeach
            @endforeach
            <tr>

                <td></td>
                <td></td>
            <td>{{ rupiah($total_pembayaran1) }}</td>                
            <td>{{ rupiah($total_pembayaran2) }}</td>
                    </tr>

        </tbody>
    </table>
    <div align="right">
        <h6>Tanda Tangan</h6><br><br>
        <h6>{{ Auth::user()->name }}</h6>
    </div>
</body>

</html>