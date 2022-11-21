<html>

<head>
    <title>Nota</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

    </style>
    <center>
        <h5>Nota Pemesanan</h4>
        <h4>CV. THAHIRAH</h4>
        <h6>Tanggal {{$date}}</h6>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pesan</th>
                <th>Tgl Pesanan</th>
                <th>Jumlah Pesanan</th>
                <th>Pelanggan</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($customer as $item)
               <tr>
                   <td>{{$loop->iteration}}</td>
                   <td>{{$item->kode_pesan}}</td>
                   <td>{{$item->tgl_pemesanan}}</td>
                   <td>{{$item->jumlah_pesanan}}</td>
                   <td>{{$item->customer->customer}}</td>
                   <td>{{ $total =  $item->sub_total}}</td>
               </tr>
           @endforeach
           <tr class="text-right">
               <td colspan="5">Total</td>
               <td >{{$total}}</td>
           </tr>
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <br>
    <table align="right">
        <tr >
            <td colspan="5">CV THAHIRA</td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td colspan="3"> Bulukumba, {{$date}}</td>
        </tr>
    </table>

</body>

</html>
