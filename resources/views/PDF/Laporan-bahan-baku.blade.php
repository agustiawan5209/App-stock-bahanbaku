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
    <center>Laporan Bahan Baku Layak Produksi</center>
    <center><h3>Tanggal : {{$periode}} </h3></center>
    <table align="center" cellpadding='1' cellspacing='0' border='1' width='500'>
        <thead>
            <tr>
                <th>No</th>
                <th>Bahan Baku</th>
                <th>Jumlah Stock</th>
                <th>Satuan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($stock and $stockAir as $val=> $stocks )
            <tr>
                <td>{{$no++}}</td>
                <td>{{$stocks->default_stock->bahan_baku}}</td>
                <td>{{number_format($stocks->jumlah_stock, 0,2)}}</td>
                <td>{{$stocks->satuan}}</td>
            </tr>
            @endforeach
            @foreach ($stockAir as $stocks )
            <tr>
                <td>{{$no++}}</td>
                <td>{{$stocks->default_bahan_air->bahan_baku}}</td>
                <td>{{number_format($stocks->jumlah_stock, 0,2)}}</td>
                <td>{{$stocks->satuan}}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
    <br>
    <table align="right">
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
</body>
</html>
