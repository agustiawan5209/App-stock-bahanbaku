<div class="animate__animated animate__fadeIn">
    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

        <a wire:click='Cetak()'>
            <x-button>
                cetak
            </x-button>
        </a>
        <br>
        <table border="0" cellspacing="5" cellpadding="5">
            <tbody>
                <tr>
                    <td colspan="1">Total</td>
                    @empty($total_date_penjualan)
                        <td class="text-center border border-gray-300 text-sm">{{ 'Rp. ' . number_format($total_penjualan, 0, 2) }}</td>
                    @else
                        <td class="text-center border border-gray-300 text-sm">{{ 'Rp. ' . number_format($total_date_penjualan, 0, 2) }}</td>
                    @endempty
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
        <br>
        <table id="Example" class="stripe hover w-full whitespace-no-wrap"
            style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-50">
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-30      ">
                    <th class=" border-white border font-semibold text-center py-1 text-dark">No</th>
                    <th class=" border-white border font-semibold text-center py-1 text-dark">Kode </th>
                    <th class=" border-white border font-semibold text-center py-1 text-dark">Bahan Baku</th>
                    <th class=" border-white border font-semibold text-center py-1 text-dark">Supplier</th>
                    <th class=" border-white border font-semibold text-center py-1 text-dark">Jumlah </th>
                    <th class=" border-white border font-semibold text-center py-1 text-dark">Sub Total</th>
                    <th class=" border-white border font-semibold text-center py-1 text-dark">Status</th>
                    <th class=" border-white border font-semibold text-center py-1 text-dark">Transaksi </th>
                </tr>
            </thead>
            <tbody>@php
                $no = 1;
            @endphp
                @if ($date == null)
                    @foreach ($barang as $item)
                        <tr>
                            <td class="text-center border border-gray-300 text-sm">{{ $no++ }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->kode_barang_masuk }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->default_stock->bahan_baku }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->supplier->supplier }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->jumlah_pembelian }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->sub_total }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->status }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->transaksi->tgl_transaksi }}</td>
                        </tr>
                    @endforeach
                    @foreach ($barangAir as $item)
                        <tr>
                            <td class="text-center border border-gray-300 text-sm">{{ $no++ }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->kode_barang_masuk }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->default_bahan_air->bahan_baku }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->supplier->supplier }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->jumlah_pembelian }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->sub_total }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->status }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->transaksi->tgl_transaksi }}</td>
                        </tr>
                    @endforeach
                @else
                    @foreach ($datebarang as $item)
                        <tr>
                            <td class="text-center border border-gray-300 text-sm">{{ $no++ }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->kode_barang_masuk }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->default_stock->bahan_baku }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->supplier->supplier }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->jumlah_pembelian }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->sub_total }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->status }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->transaksi->tgl_transaksi }}</td>
                        </tr>
                    @endforeach
                    @foreach ($datebarangAir as $item)
                        <tr>
                            <td class="text-center border border-gray-300 text-sm">{{ $no++ }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->kode_barang_masuk }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->default_bahan_air->bahan_baku }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->supplier->supplier }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->jumlah_pembelian }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->sub_total }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->status }}</td>
                            <td class="text-center border border-gray-300 text-sm">{{ $item->transaksi->tgl_transaksi }}</td>
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
    $("#Example").DataTable({
        responsive : true
    })
</script>
