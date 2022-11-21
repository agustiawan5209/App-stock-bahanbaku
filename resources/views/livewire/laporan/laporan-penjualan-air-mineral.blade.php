<div class="animate__animated animate__fadeIn">

    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow">
        <div class="w-full overflow-hidden">
            <div class=" w-full overflow-x-auto">
                <div class="w-full md:w-1/2 shadow-md rounded-md px-3 md:px-6 bg-gray-200">
                    <table border="0" cellspacing="5" cellpadding="5" class="overflow-auto">
                        <tbody>
                            <tr>
                                <td colspan="1">Total</td>
                                @empty($total_date_penjualan)
                                    <td class="px-4 py-3 text-sm">{{ 'Rp. ' . number_format($total_penjualan, 0, 2) }}
                                    </td>
                                @else
                                    <td class="px-4 py-3 text-sm">
                                        {{ 'Rp. ' . number_format($total_date_penjualan, 0, 2) }}
                                    </td>
                                @endempty
                            </tr>
                        </tbody>
                    </table>
                    <div class="grid grid-cols-1 md:grid-cols-3 grid-row-2 gap-4">
                        <div class="col-span-1">Minimum date:
                            <x-input type="date" wire:model="min_date" />
                        </div>
                        <div class="col-span-1">Maximum date:
                            <x-input type="date" wire:model="max_date" />
                        </div>
                        <div class="col-span-1">
                            <x-button wire:click='MinDate'>Cari Tanggal</x-button>
                        </div>
                        <div class="col-span-1"><select name="" id="" wire:model='row'
                                class="block w-full mt-1 text-sm          form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="col-span-1">
                            <x-button type="button" wire:click='Cetak'>Cetak</x-button>
                        </div>
                    </div>
                </div>
                <div class="w-full overflow-hidden">
                    <div class="w-full overflow-x-auto">
                        <table id=""
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-50   "
                            style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                            <thead class="w-full whitespace-no-wrap">
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-300">
                                    <th class="text-semibold p-2 text-center bg-white">No</th>
                                    <th class="text-semibold p-2 text-center bg-white">Kode Barang Keluar</th>
                                    <th class="text-semibold p-2 text-center bg-white">Alamat/Tujuan</th>
                                    <th class="text-semibold p-2 text-center bg-white">Customer</th>
                                    <th class="text-semibold p-2 text-center bg-white">Jumlah Pembelian</th>
                                    <th class="text-semibold p-2 text-center bg-white">Sub Total</th>
                                    <th class="text-semibold p-2 text-center bg-white">Transaksi </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangKeluar as $item)
                                    <tr class="text-gray-700 ">
                                        <td class=" border-2 border-gray-200 text-xs text-center ">
                                            {{ $loop->iteration }}</td>
                                        <td class=" border-2 border-gray-200 text-xs text-center  text-red-500">
                                            {{ $item->kode_barang_keluar }}</td>
                                        <td class=" border-2 border-gray-200 text-xs text-center ">
                                            {{ $item->alamat_tujuan }}</td>
                                        <td class=" border-2 border-gray-200 text-xs text-center ">
                                            {{ $item->customer }}</td>
                                        <td class=" border-2 border-gray-200 text-xs text-center ">{{ $item->jumlah }}
                                        </td>
                                        <td class=" border-2 border-gray-200 text-xs text-center ">
                                            {{ $item->sub_total }}</td>
                                        <td class=" border-2 border-gray-200 text-xs text-center ">
                                            {{ $item->tgl_keluar }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>
        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
            <nav aria-label="Table navigation">
                <ul class="inline-flex items-center">
                    {{ $barangKeluar->links() }}
                </ul>
            </nav>
        </span>

    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $(function() {

        var table = $('#PageBarangKeluar').DataTable({})


    });
</script>
