<table border="0" cellspacing="5" cellpadding="5"
    class="w-full whitespace-pre-wrap>
<tbody>
    <tr>
        <td colspan=" 1">Total</td>
    @if ($total_date_penjualan != null)
        <td><input type="text" name="1" id="1" wire:model='total_date_penjualan'></td>
    @else
        <td>{{ 'Rp. ' . number_format($total_penjualan, 0, 2) }}</td>
    @endif
    </tr>
    <tr>
        <td>Minimum date:</td>
        <td>
            <x-input type="date" wire:model="min_date" />
            @error('min_date')
                <span class='text-red-500 text-sm font-semibold'>Tanggal Awal Hars Di Isi</span>
            @enderror
        </td>
        <td>Maximum date:</td>
        <td>
            <x-input type="date" wire:model="max_date" />
            @error('max_date')
                <span class='text-red-500 text-sm font-semibold'>Tanggal Akhir Harus Di Isi</span>
            @enderror
        </td>
        <td>
            <x-button wire:click='MinDate'>Cari</x-button>
        </td>
    </tr>
    </tbody>
</table>
<table id="example" class="stripe hover w-full whitespace-no-wrap"
    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
    <thead class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-50">
        <tr>
            <th class="px-4 py-3" data-priority="5">No</th>
            <th class="px-4 py-3" data-priority="1">Kode Barang Masuk</th>
            <th class="px-4 py-3" data-priority="1">Bahan Baku</th>
            <th class="px-4 py-3" data-priority="3">Supplier</th>
            <th class="px-4 py-3" data-priority="5">Jumlah Pembelian</th>
            <th class="px-4 py-3" data-priority="2">Sub Total</th>
            <th class="px-4 py-3" data-priority="2">Status</th>
            <th class="px-4 py-3" data-priority="2">Tgl Transaksi </th>
            {{-- <th class="px-4 py-3" data-priority="1">Action</th> --}}
        </tr>
    </thead>
    <tbody>
        @empty($date)
            @foreach ($barangmasuk as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_barang_masuk }}</td>
                    <td>{{ $item->bahan }}</td>
                    <td>{{ $item->supplier->supplier }}</td>
                    <td>{{ $item->jumlah_pembelian }}</td>
                    <td>Rp. {{ number_format($item->sub_total, 0, 2) }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->transaksi->tgl_transaksi }}</td>
                    {{-- <td>
                    <ul class="flex justify-around">
                        @include('components.action.delete', ['value' => $item->id])
                        @include('components.action.edit', ['value' => $item->id, 'table' => $item->count()])
                    </ul>
                </td> --}}
                </tr>
            @endforeach
            @foreach ($barangmasukair as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_barang_masuk }}</td>
                    <td>{{ $item->bahan }}</td>
                    <td>{{ $item->supplier->supplier }}</td>
                    <td>{{ $item->jumlah_pembelian }}</td>
                    <td>Rp. {{ number_format($item->sub_total, 0, 2) }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->transaksi->tgl_transaksi }}</td>
                    {{-- <td>
                    <ul class="flex justify-around">
                        @include('components.action.delete', ['value' => $item->id])
                        @include('components.action.edit', ['value' => $item->id, 'table' => $item->count()])
                    </ul>
                </td> --}}
                </tr>
            @endforeach
        @else
            @foreach ($date as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_stock_produk }}</td>
                    <td>{{ $item->jumlah_stock_produk }}</td>
                    <td>{{ $item->tgl_stock_produk }}</td>
                    @php
                        $total = intval($item->jumlah_stock_produk * 3200);
                    @endphp
                    <td>{{ 'Rp. ' . number_format($total, 2) }}</td>
                </tr>
            @endforeach
        @endempty
    </tbody>

</table>

</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    h
</script>
