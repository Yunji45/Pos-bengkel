<!DOCTYPE html>
<html lang="en">

<head>
    <title>Struk</title>
    <style>
        body {
            font-family: arial;
        }

        .container {
            width: 25%;
            min-height: 400px;
            border: 1px dashed #ddd;
        }


        .tagline {
            text-align: center;
            font-size: 12px;
            margin-top: -15px;
        }

        tr:nth-child(even) {
            background-color: #ddd;
        }
    </style>
</head>

<body onload="window.print()">

        <div class="container">
            <h2 align="center">Fietsen Bouwer</h2>

            <td class="title">
                <img src="public/assets/FB.jpeg" width="80px">
            </td>
            
            <p class="tagline"> Jl. Cimanuk, Tegal Gundil, Bogor Utara</p>

            <table border="1" cellspacing="0" align="center" width="90%" style="font-size: 12px">
                <tr>
                    <td><strong> Tanggal </strong></td>
                    <td align="right"> {{ date('d-m-y') }}</td>
                </tr>
                <tr>
                    <td><strong> Kasir </strong></td>
                    <td align="right">{{ auth()->user()->name}}</td>
                </tr>
                <tr>
                    <td><strong> No Invoice </strong></td>
                    <td align="right">{{ request()->segment(3) }}</td>
                </tr>
            </table>

            <table border="1" cellspacing="0" align="center" width="90%" style="font-size: 12px; margin-top: 20px">
                 <tr>
                    <td colspan="7"><strong>Detail Pembelian</strong></td>
                 </tr>
                 <tr>
                    <td><strong> No </strong></td>
                    <td><strong> Nama </strong></td>
                    <td><strong> Harga </strong></td>
                    <td><strong> Qty </strong></td>
                    <td><strong> Total Harga </strong></td>
                 </tr>
                 @php
                    $no = 1;
                 @endphp
                 @foreach ($penjualan as $item)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ rupiah($item->harga_jual) }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ rupiah($item->total_harga) }}</td>
                    </tr>
                 @endforeach
                 <tr>
                    <td colspan="4"><strong>Pembayaran</strong></td>
                    <td>{{ rupiah($detail_penjualan->pembayaran) }}</td>
                 </tr>
                 <tr>
                    <td colspan="4"><strong>Total Pembayaran</strong></td>
                    <td>{{ rupiah($detail_penjualan->total_pembayaran) }}</td>
                 </tr>
                 <tr>
                    <td colspan="4"><strong>Kembalian</strong></td>
                    <td>{{ rupiah($detail_penjualan->kembalian) }}</td>
                 </tr>
            </table>

            <p style="text-align: center; font-size: 12px; margin-top: 50px">Barang yang rusak bisa dikembalikan lagi dengan
                syarat tertentu.
            </p>
            <p style="text-align: center; font-size: 12px;">--- Terima Kasih ---</p>
        </div>
    
</body>

</html>