<div class="md:container md:px-6 md:py-5">
    <div class="md:container">
        <div class=" w-full overflow-hidden">
            <div class=" w-full overflow-x-auto">
                <table border="0" cellspacing="5" cellpadding="5" class="overflow-auto">
                    <tbody>
                        <tr>
                            <td colspan="1">Total</td>
                            @empty($total_date_penjualan)
                                <td class="px-4 py-3 text-sm">{{ 'Rp. ' . number_format(intval($total_penjualan), 0, 2) }}
                                </td>
                            @else
                                <td class="px-4 py-3 text-sm">{{ 'Rp. ' . number_format($total_date_penjualan, 0, 2) }}
                                </td>
                            @endempty
                        </tr>
                        <tr>
                            <td colspan="2">
                                <select name="" id="" wire:model='row'
                                    class="block w-full mt-1 text-sm          form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </td>
                            <td colspan="2" class="px-4 py-3 text-sm ">
                                <input type='search'
                                    class="w-full px-2 py-2 rounded-md focus:border-2 focus:border-blue-400"
                                    wire:model='search' " placeholder='cari' />
                            </td>
                            <td>
                                <select name="" id="" class="w-full focus:border-gray-50 text-center font-semibold text-base rounded-lg" wire:model=statusSelected>
                                    <option value="">Status</option>
                                    <option value="Konfirmasi">Konfirmasi</option>
                                    <option value="Belum konfirmasi">Belum Terkonfirmasi</option>
                                </select>
                            </td>
                    </tbody>
                </table>
                          @if ($ItemDetail)
                                @include('livewire.user.customer.detail')
                                @endif
                                @if ($statusModal)
                                    @include('components.check-box-pesan')
                                @endif
                                @if (session()->has('message'))
                                    @include('modals', [
                                        'Alert' => $statusModal,
                                        'message' => session('message'),
                                    ])
                                @endif
                                <div class="w-full overflow-hidden">
                                    <div class="w-full overflow-x-auto">
                                        <table id=" example"
                                            class="stripe hover w-full whitespace-no-wrap border-collapse"
                                            style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                                            <thead class="">
                                                <tr
                                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-300">
                                                    <th class="text-semibold p-2 text-center bg-white">No</th>
                                                    <th class="text-semibold p-2 text-center bg-white">Kode Pesan</th>
                                                    <th class="text-semibold p-2 text-center bg-white">Pelanggan</th>
                                                    <th class="text-semibold p-2 text-center bg-white">Tanggal Pemesanan
                                                    </th>
                                                    <th class="text-semibold p-2 text-center bg-white">Jumlah Pemesanan
                                                    </th>
                                                    <th class="text-semibold p-2 text-center bg-white">Sub Total</th>
                                                    <th class="text-semibold p-2 text-center bg-white">Alamat</th>
                                                    <th class="text-semibold p-2 text-center bg-white">
                                                        Status
                                                    </th>
                                                    <th class="text-semibold p-2 text-center bg-white">Detail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pesan as $item)
                                                    <tr class=" text-gray-700"
                                                        wire:loading.class.delay.500ms='opacity-50'>
                                                        <td
                                                            class=" md:px-2 md:py-3 border border-gray-300 bg-white tex-xs text-center">
                                                            {{ $loop->iteration }}</td>
                                                        <td
                                                            class=" md:px-2 md:py-3 border border-gray-300 bg-white tex-xs text-center">
                                                            {{ $item->kode_pesan }}</td>
                                                        <td
                                                            class=" md:px-2 md:py-3 border border-gray-300 bg-white tex-xs text-center">
                                                            {{ $item->customer->customer }}</td>
                                                        <td
                                                            class=" md:px-2 md:py-3 border border-gray-300 bg-white tex-xs text-center">
                                                            {{ $item->tgl_pemesanan }}</td>
                                                        <td
                                                            class=" md:px-2 md:py-3 border border-gray-300 bg-white tex-xs text-center">
                                                            {{ $item->jumlah_pesanan }}</td>
                                                        <td
                                                            class=" md:px-2 md:py-3 border border-gray-300 bg-white tex-xs text-center">
                                                            {{ $item->sub_total }}</td>
                                                        <td
                                                            class=" md:px-2 md:py-3 border border-gray-300 bg-white tex-xs text-center">
                                                            {{ $item->alamat }}</td>
                                                        <td
                                                            class="md:px-2 md:py-3 border border-gray-300 bg-white tex-xs text-center">
                                                            @if ($item->status == 'Konfirmasi')
                                                                <a href="#_"
                                                                    class="inline-block px-2 text-xs py-2 mx-auto text-white bg-green-500 rounded-full hover:bg-green-600 md:mx-0">
                                                                    {{ $item->status }}
                                                                </a>
                                                            @elseif($item->status == 'Proses')
                                                                <a href="#_"
                                                                    class="inline-block px-2 text-xs py-2 mx-auto text-white bg-blue-500 rounded-full hover:bg-blue-600 md:mx-0">
                                                                    {{ $item->status }}
                                                                </a>
                                                            @elseif ($item->status == 'Belum konfirmasi')
                                                                <a href="#_" wire:click='Status({{ $item->id }})'
                                                                    class="inline-block px-2 text-xs py-2 mx-auto text-white bg-red-500 rounded-full hover:bg-red-600 md:mx-0">
                                                                    {{ $item->status }}
                                                                </a>
                                                            @endif
                                                        </td>
                                                        <td
                                                            class=" md:px-2 md:py-3 border border-gray-300 bg-white tex-xs text-center">
                                                            <button wire:click='Detail({{ $item->id }})'
                                                                class="  active:text-native">
                                                                <svg class="w-6 h-6" fill="none" stroke="blue"
                                                                    viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                                                    </path>
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                                    <nav aria-label="Table navigation">
                                        <ul class="inline-flex items-center">
                                            {{ $pesan->links('pagination') }}
                                        </ul>
                                    </nav>
                                </span>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    h
</script>
</div>
