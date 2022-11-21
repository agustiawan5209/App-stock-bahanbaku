<div class="animate__animated animate__fadeIn">
    <div class=" ml-4 mt-5">
        <a href="{{ route('Admin.pesan.packing') }}" class="w-full">
            <x-button class="md:w-1/4">
                {{ __('Tambah Barang Masuk') }}
            </x-button>
        </a>

    </div>

    <!-- Add Item Modal -->
    <div id='recipients' class="md:p-8 mt-6 lg:mt-0 rounded shadow bg-gray-100">
        <div class="w-full overflow-hidden">
            <div class="w-full overflow-x-auto">

                <div class=" w-full md:w-1/2 shadow-md bg-gray-50 px-3 md:px-6 rounded-lg">
                    <table border="0" cellspacing="5" cellpadding="5" class=" whitespace-pre-wrap w-full">
                        <tbody>
                            <tr>
                                <td>Total</td>
                                @empty($total_date_penjualan)
                                    <td>{{ 'Rp. ' . number_format($total_penjualan, 0, 2) }}</td>
                                @else
                                    <td>{{ 'Rp. ' . number_format($total_date_penjualan, 0, 2) }}</td>
                                @endempty
                            </tr>
                        </tbody>
                    </table>
                    <div class="grid overflow-hidden grid-cols-1 md:grid-cols-3 grid-rows-2 gap-4 w-full">
                        <div class="col-span-1">Minimal Tanggal:
                            <x-input type="date" wire:model="min_date" />
                        </div>
                        <div class="col-span-1">Maksimal Tanggal :
                            <x-input type="date" wire:model="max_date" />
                        </div>
                        <div class="col-span-1">
                            <x-button wire:click='MinDate'>Cari</x-button>
                        </div>
                        <div class="col-span-1">
                            <select wire:model="row" id=""
                                class="px-5 py-2 mx-auto text-dark bg-white border border-gray-300  rounded-full hover:bg-gray-50 md:mx-0">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="col-span-1">
                            <x-input type="search" wire:model='search' placeholder="Cari" />
                        </div>
                    </div>
                </div>
                @if ($deleteItem)
                    @include('components.action.barangmasuk.delete')
                @endif
                @if ($DetailItem)
                    @include('components.action.barangmasuk.detail')
                @endif
                @if ($statusModal)
                    @include('components.check-box')
                @endif
                @if (session()->has('message'))
                    <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3 w-1/2"
                        role="alert">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                        </svg>
                        <p>{{ session('message') }}</p>
                    </div>
                @endif
                <div class="w-full overflow-hidden">
                    <div class="w-full overflow-x-auto">
                        <table class="stripe hover w-full whitespace-no-wrap"
                            style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                            <thead
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-50">
                                <tr class=" bg-gray-200 ">
                                    <th class="text-semibold p-2 text-center text-dark">No</th>
                                    <th class="text-semibold p-2 text-center text-dark">Kode </th>
                                    <th class="text-semibold p-2 text-center text-dark">Bahan Baku</th>
                                    <th class="text-semibold p-2 text-center text-dark">Supplier</th>
                                    <th class="text-semibold p-2 text-center text-dark">Jumlah </th>
                                    <th class="text-semibold p-2 text-center text-dark">Sub Total</th>
                                    <th class="text-semibold text-center text-dark">
                                        <select wire:model="statusSelect"
                                            class="px-1 py-1 text-base text-dark bg-transparent rounded-md text-center font-semibold">
                                            <option value="">Status</option>
                                            <option value="Konfirmasi">Konfirmasi</option>
                                            <option value="Belum Konfirmasi">Belum Konfirmasi</option>
                                            <option value="Selesai">Selesai</option>
                                        </select>
                                    </th>
                                    <th class="text-semibold p-2 text-center text-dark">Transaksi </th>
                                    <th class="text-semibold p-2 text-center text-dark">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangmasuk as $item)
                                    <tr class="text-xs font-medium tracking-wide text-left text-black  border-b   bg-gray-300"
                                        wire:loading.class.delay.500ms='opacity-50'>
                                        <td class="border border-gray-100 text-xs bg-white text-center">
                                            {{ $loop->iteration }}</td>
                                        <td
                                            class="border border-gray-100 text-xs uppercase bg-white text-center text-red-500">
                                            {{ $item->kode_barang_masuk }}</td>
                                        <td class="border border-gray-100 text-xs uppercase bg-white text-center">
                                            {{ $item->default_stock->bahan_baku }}
                                        </td>
                                        <td class="border border-gray-100 text-xs uppercase bg-white text-center">
                                            {{ $item->supplier->supplier }}</td>
                                        <td class="border border-gray-100 text-xs bg-white text-center">
                                            {{ $item->jumlah_pembelian }}</td>
                                        <td class="border border-gray-100 text-xs bg-white text-center">
                                            {{ $item->sub_total }}</td>
                                        <td class="border border-gray-100 text-xs bg-white text-center">
                                            @if ($item->status == 'Konfirmasi')
                                                <button type="button" wire:click='Status({{ $item->id }})'
                                                    class="inline-block px-2 text-xs py-2 mx-auto text-white bg-green-500 rounded-full hover:bg-green-600 md:mx-0">
                                                    {{ $item->status }}
                                                </button>
                                            @elseif($item->status == 'Selesai')
                                                <button type="button"
                                                    class="inline-block px-2 text-xs py-2 mx-auto text-white bg-blue-500 rounded-full hover:bg-blue-600 md:mx-0">
                                                    {{ $item->status }}
                                                </button>
                                            @elseif ($item->status == 'Belum Konfirmasi')
                                                <button type="button"
                                                    class="inline-block px-2 text-xs py-2 mx-auto text-white bg-red-500 rounded-full hover:bg-red-600 md:mx-0">
                                                    {{ $item->status }}
                                                </button>
                                            @endif
                                        </td>
                                        <td class="border border-gray-100 text-xs bg-white text-center">
                                            {{ $item->tgl_masuk }}</td>
                                        <td class="border border-gray-100 text-xs bg-white text-center">
                                            <ul class="flex justify-around">
                                                <button wire:click='deleteModal({{ $item->id }})'><svg
                                                        class="w-6 h-6 text-red-500" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg></button>
                                                <button wire:click='Detail({{ $item->id }})'><svg
                                                        class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                                        </path>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                        </path>
                                                    </svg></button>

                                                {{-- @include('components.action.barangmasuk.edit', ['id' => $item->id]) --}}
                                            </ul>
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
                            {{ $barangmasuk->links('livewire::simple-tailwind') }}
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
