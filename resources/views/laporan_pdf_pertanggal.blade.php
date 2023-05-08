<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: arial;
        }

        td,
        th {
            padding: 2px;
        }

        th {
            text-align: left;
            background-color: #add;
        }

        tr:nth-child(odd) {
            background-color: #eee;
        }
    </style>
</head>

<body>
    
        <h2 align="center">Laporan penjualan dari tanggal {{ $tanggal1 }} sampai {{ $tanggal2 }}</h2>
        <table border="1" width="100%" cellspading="6" cellspacing="0">
            <tr>
                <th style="width: 10px; text-align:center">No</th>
                <th>Kasir</th>
                <th>No Invoice</th>
                <th>Nama Barang</th>
                <th style="width: 10px; text-align:center">Qty</th>
                <th>Total Harga</th>
            </tr>

            @php
                $no = 1;
                $total_penjualan = 0;
                $total_profit = 0;
            @endphp
            @foreach ($penjualan as $item)
            @php
                $profit = $item->qty * $item->profit;
            @endphp

                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->kode_penjualan }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ rupiah($item->total_harga) }}</td>
                </tr>
                @php
                    $total_penjualan = $total_penjualan + $item->total_harga;
                    $total_profit = $total_profit + $profit;
                @endphp

            @endforeach

            <tr>
                <td style="font-weight: bold; text-align:center" colspan="5">Total Penjualan</td>
                <td style="font-weight: bold">{{ rupiah($total_penjualan) }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold; text-align:center" colspan="5">Total Profit</td>
                <td style="font-weight: bold">{{ rupiah($total_profit) }}</td>
            </tr>
        </table>

</body>

</html>
