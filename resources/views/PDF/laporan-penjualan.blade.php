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
    body{
        margin-bottom: 50px !important;
    }
    h3{
        margin: 1px;
        padding: 0;
    }
    table{
       text-align: center;
    }
</style>
<body style=" margin-bottom:20px;">
@php
    $min_date = session('min_date');
    $max_date  =session('max_date');
@endphp
    <center><h3>CV. THAHIRAH</h3></center>
    <center>Laporan Data Penjualan Air Mineral</center>
    @if ($min_date === null || $max_date === null)
    <center><h3>Tanggal : {{$periode}} </h3></center>
    @else
    <center><h3>Periode Tanggal : {{$min_date}} - Sampai : {{$max_date}} </h3></center>
    @endif
    <br><br>
    <table align="center" cellpadding='1' cellspacing='0' border='2' width='700'>
        <thead>
            <tr>
                <th data-priority="5">No</th>
                <th data-priority="1">Kode Barang Keluar</th>
                {{-- <th data-priority="1">Produk Id</th> --}}
                <th data-priority="3">Alamat</th>
                <th data-priority="3">Customer</th>
                <th data-priority="5">Jumlah Pembelian</th>
                <th data-priority="2">Sub Total</th>
                <th data-priority="2"> Tanggal Transaksi </th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($barangkeluar as $val=> $item )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->kode_barang_keluar }}</td>
                {{-- <td>{{ $item->produk->kode_stock_produk }}</td> --}}
                <td>{{ $item->alamat_tujuan }}</td>
                <td>{{ $item->customer }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->sub_total }}</td>
                <td >{{$item->tgl_keluar}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">Total Penjualan</td>
                <td colspan="3">Rp. {{number_format(intval($sub_total), 0,2)}}</td>
            </tr>
        </tfoot>
    </table>
    <br><br>
    <table align="right" style="margin-right:100px;">
        <tr>
            <td style="font-size: 14px;">CV. THAHIRAH</td>
        </tr>
        <tr>
            <td style="font-size: 14px; text-transform: capitalize; ">BULUKUMBA, {{$tglTTD}}</td>
        </tr>
        <tr>
            <td style=" height:30px; ">Tanda tangan</td>
        </tr>
        <tr>
            <td style=" height:200px; ">Direktur CV. THAHIRAH</td>
        </tr>
    </table>
    {{session()->forget('min_date')}}
    {{session()->forget('max_date')}}
</body>
</html>
