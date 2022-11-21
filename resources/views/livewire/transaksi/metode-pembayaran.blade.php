<div>
    <div class="w-full bg-white border-t border-b border-gray-200 px-5 py-10 text-gray-800">
        <div class="w-full">
            <div class="-mx-3 md:flex items-start">
                <div class="px-3 md:w-7/12 lg:pr-10">
                    <div class="w-full mx-auto text-gray-800 font-light mb-6 border-b border-gray-200 pb-6">
                        <div class="w-full flex items-center">
                            <div
                                class="overflow-hidden rounded-lg w-16 h-16 object-cover bg-gray-50 border border-gray-200">
                                <img src="{{ asset('upload/' . session('image')) }}" class="object-fill h-full" alt="">
                            </div>
                            <div class="flex-grow pl-3">
                                <h6 class="font-semibold uppercase text-gray-600">{{ session('bahan') }}</h6>
                                <p class="text-gray-400">{{ session('image') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 pb-6 border-b border-gray-200 text-gray-800">
                        <div class="w-full flex items-center">
                            <div class="flex-grow">
                                <span class="text-gray-600">Jumlah Pembelian</span>
                            </div>
                            <div class="pl-3">
                                <span class="font-semibold">{{ $sessi['jumlah_pembelian'] }}</span>
                            </div>
                        </div>
                        <div class="w-full flex items-center">
                            <div class="flex-grow">
                                <span class="text-gray-600">Harga</span>
                            </div>
                            <div class="pl-3">
                                <span class="font-semibold">
                                    {{ 'Rp. ' . number_format($sessi['harga'], 0, 2) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 pb-6 border-b border-gray-200 md:border-none text-gray-800 text-xl">
                        <div class="w-full flex items-center">
                            <div class="flex-grow">
                                <span class="text-gray-600">Total</span>
                            </div>
                            <div class="pl-3"><span class="font-semibold">
                                    {{ 'Rp. ' . number_format($sessi['sub_total'], 0, 2) }}</span>
                            </div>
                        </div>
                    </div>
                    <h4>
                    </h4>
                    <div class="w-full mb-2">

                    </div>
                </div>

                <div class="px-3 md:w-5/12">
                    <div
                        class="w-full mx-auto rounded-lg bg-white border border-gray-200 p-3 text-gray-800 font-light mb-6">
                        <div class="w-full flex mb-3 items-center">
                            <div class="w-32">
                                <span class="text-gray-600 font-semibold">Supplier</span>
                            </div>
                            <div class="flex-grow pl-3">
                                <span>{{ $sessi['supplier_name'] }}</span>
                            </div>
                        </div>
                        <div class="w-full flex items-center">
                            <div class="w-32">
                                <span class="text-gray-600 font-semibold">Contact</span>
                            </div>
                            <div class="flex-grow pl-3">
                                <span> +{{ $sessi['supplier_phone'] }}</span>
                            </div>
                        </div>
                    </div>
                    <div
                        class="w-full mx-auto rounded-lg bg-white border border-gray-200 text-gray-800 font-light mb-6">
                        <div class="w-full p-3  border-b border-gray-200">
                            <div class="mb-5 flex justify-around items-center flex-wrap">
                                @foreach ($payment as $payments)
                                    <label for="type1" class="flex items-center cursor-pointer"
                                        wire:click='GetPayment({{ $payments->id }})'>
                                        <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="type"
                                            id="type1" value="{{ $payments->metode }}" wire:model='metode'>
                                        {{ $payments->metode }}
                                    </label>
                                @endforeach
                            </div>
                            <div>
                                <div class="mb-3">
                                    <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">Nama Rekening</label>
                                    <div>
                                        <input
                                            class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                            placeholder="John Smith" type="text" " readonly wire:model='name_card'/>
                                        @error('name_card')
    <span class="     text-xs text-red-500 whitespace-no-wrap">Mohon untuk Memilih Pembayaran Akun</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" mb-3">
                                    <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">Nomor
                                        Rekening</label>
                                    <div>
                                        <input
                                            class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                            placeholder="0000 0000 0000 0000" type="text" readonly
                                            wire:model='card_number' />
                                        @error('card_number')
                                            <span class="text-xs text-red-500 whitespace-no-wrap">Mohon untuk Memilih
                                                Pembayaran Akun</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 -mx-2 flex items-end">
                                    <div class="px-2 w-1/2">
                                        <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">Tanggal
                                            Transaksi</label>
                                        <div>
                                            <input
                                                class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                 type="date" wire:model='tgl_transaksi' />
                                            @error('tgl_transaksi')
                                                <span class="text-xs text-red-500 whitespace-no-wrap">Mohon untuk Mengisi
                                                    Tanggal Transaksi</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="grid overflow-hidden grid-lines grid-cols-4 grid-rows-2 gap-5"
                                    class="min-w-screen min-h-screen bg-gray-50 py-5" x-data="{ isUploading: false, progress: 0 }"
                                    x-on:livewire-upload-start="isUploading = true"
                                    x-on:livewire-upload-finish="isUploading = false"
                                    x-on:livewire-upload-error="isUploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress">

                                    <div class="box row-start-1 row-span-2 col-start-1 col-span-2"><label
                                            class="text-gray-600 font-semibold text-sm mb-2 ml-1">Bukti
                                            Transaksi</label>
                                        <div>
                                            <input
                                                class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                placeholder="000" type="file" wire:model='bukti_transaksi' id='Image'
                                                wire:change='PreviewImage' />
                                            @error('bukti_transaksi')
                                                <span
                                                    class="text-xs text-red-500 whitespace-no-wrap">{{ $message }}</span>
                                            @enderror
                                            <div x-show="isUploading">
                                                <progress max="50" x-bind:value="progress"></progress>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box row-span-2 col-start-3 col-span-2">
                                        @if ($bukti_transaksi)
                                            bukti_transaksi Preview:
                                            <img src="{{ $bukti_transaksi->temporaryUrl() }}" class=" w-24 h-24">
                                        @endif
                                    </div>

                                    <div class="px-2 w-1/2">


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex-row md:flex justify-between items-center">
                        <x-button wire:click='Payment'
                            class="block w-1/3 max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-2 font-semibold">
                            Bayar Sekarang</x-button>
                        <button wire:click="Cancel()"
                            class="block w-1/3 max-w-xs mx-auto bg-red-500 hover:bg-red-700 focus:bg-red-700 text-white rounded-lg px-3 py-2 font-semibold">Batalkan</button>
                    </div>
                    @if ($modal)
                        <div class=" z-50">
                            <div x-show="{{ $modal }}" x-transition:enter="transition ease-out duration-150"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                class="fixed inset-0 z-50 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                                <!-- Modal -->
                                <div x-show="{{ $modal }}" x-transition:enter="transition ease-out duration-150"
                                    x-transition:enter-start="opacity-0 transform translate-y-1/2"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0  transform translate-y-1/2"
                                    @click.away="closeModal" @keydown.escape="closeModal"
                                    class="w-sm px-6 py-4 overflow-hidden bg-white rounded-t-lg    sm:rounded-lg sm:m-4 sm:max-w-xl"
                                    role="dialog" id="modal">
                                    <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                                    <header class="flex justify-end">
                                        <button
                                            class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded    hover: hover:text-gray-700"
                                            aria-label="close" wire:click='CloseModal()'>
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                role="img" aria-hidden="true">
                                                <path
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </header>
                                    <!-- Modal body -->
                                    <div class="mt-4 mb-6">
                                        <!-- Modal title -->
                                        <p class="mb-2 text-lg font-semibold text-gray-700   ">
                                            Pemberitahuan
                                        </p>
                                        <!-- Modal description -->
                                        <p class="text-sm text-gray-700   ">
                                            Apakah Anda Yakin Ingin Menghapus Pembayaran?
                                        </p>
                                    </div>
                                    <x-button type="button" class="mr-5" wire:click='CloseModal()'>Tidak
                                    </x-button>
                                    <x-danger-button type="button" wire:click='delete()'>Ya
                                    </x-danger-button>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($bayar)
                        <div class=" z-50">
                            <div x-show="{{ $modal }}" x-transition:enter="transition ease-out duration-150"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                class="fixed inset-0 z-50 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                                <!-- Modal -->
                                <div x-show="{{ $modal }}" x-transition:enter="transition ease-out duration-150"
                                    x-transition:enter-start="opacity-0 transform translate-y-1/2"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0  transform translate-y-1/2"
                                    @click.away="closeModal" @keydown.escape="closeModal"
                                    class="w-sm px-6 py-4 overflow-hidden bg-white rounded-t-lg    sm:rounded-lg sm:m-4 sm:max-w-xl"
                                    role="dialog" id="modal">
                                    <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                                    <header class="flex justify-end">
                                        <button
                                            class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded    hover: hover:text-gray-700"
                                            aria-label="close" wire:click='CloseModal()'>
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                role="img" aria-hidden="true">
                                                <path
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </header>
                                    <!-- Modal body -->
                                    <div class="mt-4 mb-6">
                                        <!-- Modal title -->
                                        <p class="mb-2 text-lg font-semibold text-gray-700   ">
                                            Pemberitahuan
                                        </p>
                                        <!-- Modal description -->
                                        <p class="text-sm text-gray-700   ">
                                            Konfirmasi Pembayaran

                                        </p>
                                    </div>
                                    <x-button type="button" class="mr-5" wire:click='CloseModal()'>Tidak
                                    </x-button>
                                    <x-danger-button type="button" wire:click='Bayar()'>Ya
                                    </x-danger-button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
