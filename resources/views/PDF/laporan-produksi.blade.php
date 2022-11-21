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
    h3{
        margin: 1px;
        padding: 0;
    }
    table{
       text-align: center;
    }
</style>
<body>

    <center><h3>CV. THAHIRAH</h3></center>
    <center>Laporan Data Bahan Baku</center>
    <center><h3>Tanggal : {{$periode}} </h3></center>
    @if($max_date && $min_date)
    <center><h3>Periode : {{$min_date}} - {{$max_date}} </h3></center>
    @endif
    <table align="center" cellpadding='1' cellspacing='0' border='1' width='500'>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Produk</th>
                <th>Tanggal Produk</th>
                <th>Jumlah Stock</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data  as $val=> $item )
            <tr>
                <td>{{$no++}}</td>
                <td>{{ $item->kode_stock_produk }}</td>
                <td>{{ $item->tgl_stock_produk }}</td>
                <td>{{ $item->jumlah_stock_produk }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3">Total Jumlah Produk</td>
                <td>{{session('jumlah_stock_produk')}}</td>
            </tr>
            <tr>
                <td colspan="3">Total Penjualan</td>
                <td>Rp. {{number_format(intval(session('jumlah_stock_produk') * 12800) ,0,2)}}</td>
            </tr>
        </tbody>

    </table>
    <br>
    <br>
    <table align="right"style="margin-right: 200px;">
        <tr>
            <td style="font-size: 14px;">CV. THAHIRAH</td>
        </tr>
        <tr>
            <td style="font-size: 14px; text-transform: capitalize; ">BULUKUMBA, {{$tglTTD}}</td>
        </tr>
        <tr>
            <td style=" height:20px; ">Tanda tangan</td>
        </tr>
        <tr>
            <td style=" height:200px; ">Direktur CV. THAHIRAH</td>
        </tr>
    </table>
</body>
</html>
