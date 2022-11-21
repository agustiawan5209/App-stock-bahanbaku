
@foreach ($bb as $item)
    <tr>
        <td class="border border-black">{{ $item->default_stock->bahan_baku }}</td>
        <td class="border border-black">{{ $item->harga }}</td>
        <td class="border border-black">{{ $item->jumlah_stock }}</td>
        <td class="border border-black">{{ $item->isi }}</td>
    </tr>
@endforeach
