<div class="animate__animated animate__fadeIn">
    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-gray-100">
        <div class="p-4">
            {{-- <x-jet-button wire:click="ProdukModal" wire:loading.attr="disabled">
                {{ __('Tambahkan Produk Air Mineral') }}
            </x-jet-button> --}}

            <!-- Add Item Modal -->
            {{-- <x-jet-dialog-modal wire:model="ItemProdukModal">
                <form>
                    @csrf
                    <x-slot name="title">
                        {{ __('Tambahlan Produk') }}
                    </x-slot>

                    <x-slot name="content">
                        <div class="rounded-md shadow-sm -space-y-px">
                            <div class="grid gap-6">
                                <div class="col-span-12">
                                    <label for="first_name" class="block text-sm font-medium text-gray-700">Kode
                                        Produk</label>
                                    <x-input type="text"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        required auto-complete="current-kodeProduk" placeholder="kode"
                                        value="{{ $kodeProduk }}" readonly />
                                    <x-button wire:click.prevent="autoCode()">
                                        Buat Kode
                                    </x-button>
                                    @error('kodeProduk')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-span-12">
                                    <label for="email_address" class="block text-sm font-medium text-gray-700">Tanggal
                                        Produk</label>
                                    <x-input type="date" wire:model.lazy='tgl_Produk' required
                                        autocomplete="current-tgl_Produk"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    @error('tgl_Produk')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-12">
                                <label for="email_address" class="block text-sm font-medium text-gray-700">Jumlah
                                    Produk</label>
                                <x-input type="number" wire:model='jmlh_produk' required
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    value="{{ $tgl_Produk }}" />
                                @error('jmlh_produk')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </x-slot>

                    <x-slot name="footer">
                        <x-jet-danger-button wire:click="$toggle('ItemProdukModal')" wire:loading.attr="disabled">
                            {{ __('Cancel') }}
                            </x-jet-button>
                            <x-jet-button wire:click.prevent="Saved()" name="simpan" type="button">
                                {{ __('Tambah Data') }}
                            </x-jet-button>
                    </x-slot>
                </form>
            </x-jet-dialog-modal> --}}
            @if (session()->has('message'))
                <div class="bg-red-100 border border-red-400 w-40 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Berhasil</strong>
                    <span class="block sm:inline">Disimpan</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            @endif
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table border="0" cellspacing="5" cellpadding="5" class="overflow-auto">
                    <tbody>
                        <tr>
                            <td colspan="1">Total</td>
                            @empty($total_date_penjualan)
                                <td class="px-4 py-3 text-sm">{{ 'Rp. ' . number_format($total_penjualan, 0, 2) }}</td>
                            @else
                                <td class="px-4 py-3 text-sm">{{ 'Rp. ' . number_format($total_date_penjualan, 0, 2) }}
                                </td>
                            @endempty
                        </tr>
                        <tr>
                            <td colspan="2">
                                <select name="" id="" wire:model='Column'>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </td>
                            <td class="px-4 py-3 text-sm">Minimum date:</td>
                            <td class="px-4 py-3 text-sm"><input type="date" wire:model="min_date"></td>

                            <td class="px-4 py-3 text-sm">
                                <x-jet-button wire:click='MinDate' class="font-normal"><span class="text-xs">Cari
                                        Tanggal</span></x-jet-button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="px-4 py-3 text-sm ">
                                <input type='search'
                                    class="w-full px-2 py-2 rounded-md focus:border-2 focus:border-blue-400"
                                    wire:model='search' " placeholder='cari' />
                            </td>
                            <td class="    px-4 py-3 text-sm">Maximum date:
                            </td>
                            <td class="px-4 py-3 text-sm"><input type="date" wire:model="max_date"></td>
                        </tr>
                    </tbody>
                </table>
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-50      ">
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Kode Stock Produk</th>
                            <th class="px-4 py-3">Jumlah Stock Produk</th>
                            <th class="px-4 py-3">Tanggal Stock Produk</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y     ">
                              @foreach ($produk as $item)
                        <tr class="text-gray-700   ">
                            <td class="px-4 py-3">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $item->kode_stock_produk }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $item->jumlah_stock_produk }}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                {{ $item->tgl_stock_produk }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    @include('components.action.delete', ['value' => $item->id])
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
        </div>
        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
            <nav aria-label="Table navigation">
                <ul class="inline-flex items-center">
                    {{ $produk->links() }}
                </ul>
            </nav>
        </span>
    </div>
</div>


<script>
    $(document).ready(function() {

        var table = $('#example').DataTable({
                responsive: true,
            })
            .columns.adjust()
            .responsive.recalc();
    });
</script>
