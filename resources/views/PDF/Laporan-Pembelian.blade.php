<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="{{asset('css/tailwind.css')}}"> --}}
</head>
<style>
    h3 {
        margin: 1px;
        padding: 0;
    }

    table {
        text-align: center;
    }
</style>

<body style="height:800px">

    <center>
        <h3>CV. THAHIRAH</h3>
    </center>
    <center>Laporan Pembelian Bahan Baku</center>

    @if ($min_date === null || $max_date === null)
        <center>
            <h3>Tanggal : {{ $periode }} </h3>
        </center>
    @else
        <center>
            <h3>Periode Tanggal : {{ $min_date }} - Sampai : {{ $max_date }} </h3>
        </center>
    @endif
    <table align="center" cellpadding='1' cellspacing='0' border='1' width='100%'>
        <thead>
            <tr>
            <tr>
                <th class="" data-priority="5">No</th>
                <th class="" data-priority="1">Kode </th>
                <th class="" data-priority="1">Bahan Baku</th>
                <th class="" data-priority="3">Supplier</th>
                {{-- <th class="" data-priority="2">Status</th> --}}
                {{-- <th class="" data-priority="2">ID Transaksi </th> --}}
                {{-- <th class="" data-priority="2">Metode Transaksi </th> --}}
                <th class="" data-priority="2">Tanggal Transaksi </th>
                <th class="" data-priority="1">Jumlah </th>
                <th class="" data-priority="1">Harga</th>
            </tr>
            </tr>
        </thead>
        <tbody>@php
            $no = 1;
        @endphp
            @foreach ($data as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->kode_barang_masuk }}</td>
                    <td>{{ $item->default_stock->bahan_baku }}</td>
                    <td>{{ $item->supplier->supplier }}</td>
                    {{-- <td>{{ $item->status }}</td> --}}
                    {{-- <td>{{ $item->transaksi->kode_transaksi }}</td> --}}
                    {{-- <td>{{ $item->transaksi->metode }}</td> --}}
                    <td>{{ $item->transaksi->tgl_transaksi }}</td>
                    <td>{{ $item->jumlah_pembelian }}</td>
                    <td>Rp. {{ number_format($item->harga, 0, 2) }}</td>
                </tr>
            @endforeach
            @foreach ($dataAir as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->kode_barang_masuk }}</td>
                    <td>{{ $item->default_bahan_air->bahan_baku }}</td>
                    <td>{{ $item->supplier->supplier }}</td>
                    {{-- <td>{{ $item->status }}</td> --}}
                    {{-- <td>{{ $item->transaksi->kode_transaksi }}</td> --}}
                    {{-- <td>{{ $item->transaksi->metode }}</td> --}}
                    <td>{{ $item->transaksi->tgl_transaksi }}</td>
                    <td>{{ $item->jumlah_pembelian }}</td>
                    <td>Rp. {{ number_format($item->harga, 0, 2) }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="6">Total</td>
                <td>Rp. {{ number_format(intval(session('sub_total')), 0, 2) }}</td>
            </tr>
        </tbody>

    </table>
    <br><br>
    <table align="right" style="position: relative; right:150px;">
        <tr>
            <td style="font-size: 14px;">CV. THAHIRAH</td>
        </tr>
        <tr>
            <td style="font-size: 14px; text-transform: capitalize; ">BULUKUMBA, {{ $tglTTD }}</td>
        </tr>
        <tr>
            <td style=" height:30px; ">Tanda tangan</td>
        </tr>
        <tr>
            <td style=" height:200px; ">Direktur CV. THAHIRAH</td>
        </tr>
    </table>
</body>

</html>
