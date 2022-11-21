<div class="animate__animated animate__fadeIn">
    <div class=" ml-4 mt-5">

        <x-button wire:click="OpenModal" wire:loading.attr="disabled">
            {{ __('Tambah Barang Keluar') }}
        </x-button>
    </div>

    <!-- Add Item Modal -->
    <x-dialog-modal wire:model="addItem" maxWidth='md'>
        <form>
            @csrf
            <x-slot name="title">
                {{ __('Tambahkan Barang Keluar') }}
            </x-slot>

            <x-slot name="content">
                <div>
                    <x-jet-label for="" value="{{ __('Customer') }}" />
                    <select id="supplier"
                        class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                        wire:model='customer_name'>
                        <option value="--">--Pilih--</option>
                        @foreach ($customer_id as $customerss)
                            <option value="{{ $customerss->customer }}">{{ $customerss->customer }}</option>
                        @endforeach
                        <input type="hidden" name="" wire:model='nama_pelanggan'/>
                    </select>
                    <span>Pilih Atau Input Pelanggan</span>
                    <x-jet-input type="text" wire:model='customer_name' placeholder='Nama Pelanggan'/>
                    @error('customer')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-jet-label for="" value="{{ __('Kode-Barang Keluar') }}" />
                    <div class="flex flex-row justify-start items-center">
                        <div>
                            <x-jet-input name='KBK' class="block mt-2 w-full" type='text' wire:model='KBK' readonly />
                            @error('KBK')
                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <x-jet-button type='button' class="block h-8" wire:click='generateKode'>
                            Buat Kode
                        </x-jet-button>
                    </div>
                </div>
                <div>
                    <x-jet-label for="" value="{{ __('Alamat') }}" />
                    <x-jet-input name='alamat' class="block mt-2 w-full" type='text' wire:model='alamat' />
                    @error('alamat')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-jet-label for="" value="{{ __('Tanggal Keluar') }}" />
                    <x-jet-input name='tgl' class="block mt-2 w-full" type='date' wire:model='tgl' />
                    @error('tgl')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-jet-label for="" value="{{ __('Jumlah Pembelian') }}" />
                    <x-jet-input name='KBM' class="block mt-2 w-full" wire:keyup="getTotal" wire:model='jumlah'
                        type='text' />
                    @error('jumlah')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-jet-label for="" value="{{ __('Sub_total') }}" />
                    <x-jet-input name='KBM' wire:model='sub_total' class="block mt-2 w-full" type='text' />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-danger-button wire:click="CloseModal" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-danger-button>
                <x-jet-button type="button" wire:click.prevent='submit'>
                    {{ __('Tambah Data') }}
                </x-jet-button>
            </x-slot>
        </form>
    </x-dialog-modal>

    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow">
        @if ($deleteItem)
            @include('components.action.barangkeluar.delete')
        @endif
        @if ($EditItem)
            @include('components.action.barangkeluar.edit')
        @endif
        <div class="w-full overflow-hidden">
            <div class=" w-full overflow-x-auto">
               <div class="w-full md:w-1/2 shadow-md rounded-md px-3 md:px-6 bg-gray-200">
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
                    </tbody>
                </table>
                <div class="grid grid-cols-1 md:grid-cols-3 grid-row-2 gap-4">
                    <div class="col-span-1">Minimum date:<x-jet-input type="date" wire:model="min_date" /></div>
                    <div class="col-span-1">Maximum date: <x-jet-input type="date" wire:model="max_date" /></div>
                    <div class="col-span-1"><x-button wire:click='MinDate'>Cari</x-button></div>
                    <div class="col-span-1"><select name="" id="" wire:model='row'
                        class="block w-full mt-1 text-sm          form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select></div>
                    <div class="col-span-1"><input type='search'
                        class="w-full px-2 py-2 rounded-md focus:border-2 focus:border-blue-400"
                        wire:model='search' placeholder='cari' /></div>
                </div>
               </div>
               <div class="w-full overflow-hidden">
                   <div class="w-full overflow-x-auto">
                    @if (session()->has('Alert'))
                    <div >
                        @include('modals', ['message' => session('Alert'), 'Alert' => $Alert])
                    </div>
                @endif
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
                            <th class="text-semibold p-2 text-center bg-white">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangKeluar as $item)
                            <tr class="text-gray-700 ">
                                <td class=" border-2 border-gray-200 text-xs text-center ">{{ $loop->iteration }}</td>
                                <td class=" border-2 border-gray-200 text-xs text-center  text-red-500">
                                    {{ $item->kode_barang_keluar }}</td>
                                <td class=" border-2 border-gray-200 text-xs text-center ">{{ $item->alamat_tujuan }}</td>
                                <td class=" border-2 border-gray-200 text-xs text-center ">{{ $item->customer }}</td>
                                <td class=" border-2 border-gray-200 text-xs text-center ">{{ $item->jumlah }}</td>
                                <td class=" border-2 border-gray-200 text-xs text-center ">{{ $item->sub_total }}</td>
                                <td class=" border-2 border-gray-200 text-xs text-center ">{{ $item->tgl_keluar }}</td>
                                <td class=" border-2 border-gray-200 text-xs text-center ">
                                    <ul class="flex justify-around">
                                        <button wire:click='deleteModal({{ $item->id }})'><svg
                                                class="w-6 h-6 text-red-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg></button>
                                        <button wire:click='EditModal({{ $item->id }})'><svg
                                                class="w-6 h-6 text-green-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg></button>
                                    </ul>
                                </td>
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

        var table = $('#PageBarangKeluar').DataTable({
        })


    });
</script>
