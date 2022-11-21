<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-3">

        <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg ">
            @if (session()->has('error'))
                <div role="alert">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        <img width='50' src="{{ asset('img/alert/icons8-error.gif') }}" alt="">
                        Pemberitahuan Sistem
                    </div>
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                        <p>{{ session('error') }}</p>
                    </div>
                </div>
            @endif
            @if (session()->has('message'))
                <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" wire:model='Alert'
                    role="alert" wire:click='Close()' wire:model.debounce.500ms='Alert'>
                    <div x-show="Alert" x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                        <!-- Modal -->
                        <div x-show="Alert" x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0 transform translate-y-1/2"
                            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal"
                            @keydown.escape="closeModal"
                            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg    sm:rounded-lg sm:m-4 sm:max-w-xl"
                            role="dialog" id="modal">
                            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                            <header class="flex justify-end">
                                <button
                                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded    hover: hover:text-gray-700"
                                    aria-label="close" @click="closeModal">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img"
                                        aria-hidden="true">
                                        <path
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </header>
                            <!-- Modal body -->
                            <div class="mt-4 mb-6 text-center">
                                <!-- Modal title -->
                                <p class="mb-2 text-lg font-semibold text-gray-700  max-w-md ">
                                    Pemberitahuan
                                <div class="w-full flex justify-center"><img width='50'
                                        src="{{ asset('img/alert/icons8-error.gif') }}" alt=""></div>
                                </p>
                                <!-- Modal description -->
                                <p class="text-sm text-gray-700">
                                    {{ session('message') }}
                                </p>
                            </div>
                            <footer
                                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50   ">
                                <x-danger-button @click="closeModal"
                                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-gray-300 rounded-lg    sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                                    Tutup
                                </x-danger-button>
                            </footer>
                        </div>
                    </div>

                </div>
            @endif
            @if ($stock_habis->count() > 0)
                <div role="alert" class="flex">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        <img src="{{ asset('img/alert/icons8-error.gif') }}" alt="">
                        Pemberitahuan Sistem
                    </div>
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-500 px-4 py-3 text-red-700">
                        <p class="text-sm">!MAAF JUMLAH BAHAN BAKU PACKAGING TIDAK TERSEDIA UNTUK INPUT
                            PRODUK JADI</p>
                    </div>
                </div>
            @endif
            @if ($stockAirMineral_habis->count() > 0)
                <div role="alert" class="flex">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        <img src="{{ asset('img/alert/icons8-error.gif') }}" alt="">
                        Pemberitahuan Sistem
                    </div>
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-500 px-4 py-3 text-red-700">
                        <p class="text-sm">!MAAF JUMLAH BAHAN BAKU AIR TIDAK TERSEDIA UNTUK INPUT PRODUK
                            JADI</p>
                    </div>
                </div>
            @endif
            <!-- component -->
            <section class="grid grid-cols-9 gap-2 w-full">
                <div class="col-span-6 md:col-span-9">
                    <div
                        class="w-full h-14 pt-2 text-center  bg-gray-700  shadow overflow-hidden sm:rounded-md font-bold text-2xl text-white ">
                        Input Produksi Air Mineral
                    </div>
                    <section class="text-gray-600 body-font  m-0 p-0 relative"></section>
                    <div class="container mx-auto">
                        <div class="mt-10 md:mt-0 md:col-span-2">
                            <form action="#">
                                @csrf
                                @method('POST')
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-2 py-8 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6 mt-3">
                                            <div class="col-span-6 md:flex">
                                                <label for="produk_jadi"
                                                    class="block text-lg font-serif font-medium text-gray-700">Masukkan
                                                    Jumlah <strong>Produk Air Mineral</strong></label>
                                                <x-input type="number" class="border-2 border-black" name="produk_jadi"
                                                    wire:model='produk_jadi'
                                                    placeholder="Masukkan Jumlah Produk Jadi" />
                                                @error('produk_jadi')
                                                    {{ $message }}
                                                @enderror
                                                <x-button class="bg-gray-700 hover:bg-gray-700" type="button"
                                                    wire:click='Proses'>Proses</x-button>
                                            </div>
                                            <hr class="col-span-6">
                                            <div class=" col-span-6 grid grid-cols-6 gap-4 bg-white">
                                                <div
                                                    class=" col-span-2 md:col-span-1 px-2 py-2 rounded-lg bg-gray-700 ">
                                                    <label for="first-name"
                                                        class="block text-lg font-serif font-medium text-white">
                                                        Jumlah <strong>Dus</strong> Yang Terpakai</label>
                                                    <x-input type="text"
                                                        class="outline-black focus:outline-black border-2 border-black"
                                                        readonly name="first-name" wire:model='inp_air1'
                                                        class="" />
                                                </div>
                                                <div
                                                    class=" col-span-2 md:col-span-1 px-2 py-2 rounded-lg bg-gray-700 ">
                                                    <label for="first-name"
                                                        class="block text-lg font-serif font-medium text-white">
                                                        Jumlah <strong>Pipet</strong> Yang Terpakai</label>
                                                    <x-input type="text"
                                                        class="outline-black focus:outline-black border-2 border-black"
                                                        readonly name="first-name" wire:model='inp_air2'
                                                        class="" />
                                                </div>
                                                <div
                                                    class=" col-span-2 md:col-span-1 px-2 py-2 rounded-lg bg-gray-700 ">
                                                    <label for="first-name"
                                                        class="block text-lg font-serif font-medium text-white">
                                                        Jumlah <strong>Cup</strong> Yang Terpakai</label>
                                                    <x-input type="text"
                                                        class="outline-black focus:outline-black border-2 border-black"
                                                        readonly name="first-name" wire:model='inp_air3'
                                                        class="" />
                                                </div>
                                                <div
                                                    class=" col-span-2 md:col-span-1 px-2 py-2 rounded-lg bg-gray-700 ">
                                                    <label for="first-name"
                                                        class="block text-lg font-serif font-medium text-white">
                                                        Jumlah <strong>Penutup</strong> Yang Terpakai</label>
                                                    <x-input type="text"
                                                        class="outline-black focus:outline-black border-2 border-black"
                                                        readonly name="first-name" wire:model='inp_air4'
                                                        class="" />
                                                </div>
                                                <div
                                                    class=" col-span-2 md:col-span-1 px-2 py-2 rounded-lg bg-gray-700 ">
                                                    <label for="first-name"
                                                        class="block text-lg font-serif font-medium text-white">
                                                        Jumlah <strong>Karbon Aktif</strong> Yang Terpakai</label>
                                                    <x-input type="text"
                                                        class="outline-black focus:outline-black border-2 border-black"
                                                        readonly name="first-name" wire:model='inp_air5'
                                                        class="" />
                                                </div>
                                                <div
                                                    class=" col-span-2 md:col-span-1 px-2 py-2 rounded-lg bg-gray-700 ">
                                                    <label for="first-name"
                                                        class="block text-lg font-serif font-medium text-white">
                                                        Jumlah <strong>Pasir Aktif</strong> Yang Terpakai</label>
                                                    <x-input type="text"
                                                        class="outline-black focus:outline-black border-2 border-black"
                                                        readonly name="first-name" wire:model='inp_air6'
                                                        class="" />
                                                </div>
                                                <div
                                                    class=" col-span-2 md:col-span-1 px-2 py-2 rounded-lg bg-gray-700 ">
                                                    <label for="first-name"
                                                        class="block text-lg font-serif font-medium text-white">
                                                        Jumlah <strong>Pasir Silica</strong> Yang Terpakai</label>
                                                    <x-input type="text"
                                                        class="outline-black focus:outline-black border-2 border-black"
                                                        readonly name="first-name" wire:model='inp_air7'
                                                        class="" />
                                                </div>
                                                <div
                                                    class=" col-span-2 md:col-span-1 px-2 py-2 rounded-lg bg-gray-700 ">
                                                    <label for="first-name"
                                                        class="block text-lg font-serif font-medium text-white">
                                                        Jumlah <strong>Magnesium Bubuk</strong> Yang
                                                        Terpakai</label>
                                                    <x-input type="text"
                                                        class="outline-black focus:outline-black border-2 border-black"
                                                        readonly name="first-name" wire:model='inp_air8'
                                                        class="" />
                                                </div>
                                                <div
                                                    class=" col-span-2 md:col-span-1 px-2 py-2 rounded-lg bg-gray-700 ">
                                                    <label for="first-name"
                                                        class="block text-lg font-serif font-medium text-white">
                                                        Jumlah <strong>Post Carbon Filter</strong> Yang
                                                        Terpakai</label>
                                                    <x-input type="text"
                                                        class="outline-black focus:outline-black border-2 border-black"
                                                        readonly name="first-name" wire:model='inp_air9'
                                                        class="" />
                                                </div>
                                                <div class=" col-span-6 md:col-span-6">
                                                    <div class="px-4 py-3 bg-white text-right sm:px-6">
                                                        @if (session()->has('error') || $stock_habis->count() > 0 || $stockAirMineral_habis->count() > 0)
                                                            <x-button type="button" disabled
                                                                class="inline-flex justify-center w-full py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md ring  ring-red-500 ring-offset-4 bg-red-600 hover:bg-red-700 text-whitefocus:outline-none focus:ring-2  focus:ring-red-500 text-white">
                                                                Maaf Stock Tidak Cukup Untuk Input Data
                                                            </x-button>
                                                        @else
                                                            <x-button type="button" wire:click='ModalOpen'
                                                                class="inline-flex justify-center w-full py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md ring  ring-gray-500 ring-offset-4 bg-gray-600 hover:bg-gray-700 text-whitefocus:outline-none focus:ring-2  focus:ring-gray-500">
                                                                Simpan
                                                            </x-button>
                                                        @endif
                                                        @if ($InputItem)
                                                            <div
                                                                class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
                                                                <div
                                                                    class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                                                    <div class="fixed inset-0 transition-opacity">
                                                                        <div
                                                                            class="absolute inset-0 bg-gray-500 opacity-75">
                                                                        </div>
                                                                    </div>
                                                                    <!-- This element is to trick the browser into centering the modal contents. -->
                                                                    <span
                                                                        class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
                                                                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                                                                        role="dialog" aria-modal="true"
                                                                        aria-labelledby="modal-headline">
                                                                        <form>
                                                                            <div
                                                                                class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                                                <div class="">
                                                                                    <div class="mb-4">
                                                                                        <label
                                                                                            for="exampleFormControlInput1"
                                                                                            class="block text-gray-700 text-sm font-bold mb-2">Apakah
                                                                                            Anda Yakin?</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                                                <span
                                                                                    class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                                                                    <button
                                                                                        wire:click.prevent='Update()'
                                                                                        type="button"
                                                                                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                                                                        Simpan
                                                                                    </button>
                                                                                </span>
                                                                                <span
                                                                                    class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                                                                    <button wire:click="CloseModal()"
                                                                                        type="button"
                                                                                        class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                                                                        Cancel
                                                                                    </button>
                                                                                </span>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @if ($stock_akhir == false)
                <div class=" md:col-span-2 ">
                    <div
                        class="w-full h-14 pt-2 text-center  bg-gray-700  shadow overflow-hidden sm:rounded-md font-bold text-md text-white ">
                        Stock Awal
                    </div>
                    <section class="text-gray-600 body-font  m-0 p-0 relative mb-1"></section>
                    <div class="container mx-auto mb-10">
                        <div class="mt-10 md:mt-0 md:col-span-2">
                            @if ($stock_akhir_packaging != null || $stock_akhir_air_s != null)
                                <div
                                    class="shadow overflow-hidden sm:rounded-md grid grid-cols-1 md:grid-cols-6 gap-4">
                                    @foreach ($stock_akhir_packaging as $item)
                                        <div
                                            class="w-full bg-gray-700 border rounded-lg border-gray-700 p-2 shadow hover:bg-gray-700 delay-100 duration-200">
                                            <!-- Header -->
                                            <div class="flex flex-row">
                                                <p class="ml-3">
                                                    <span
                                                        class="text-gray-100 text-md font-semibold">{{ $item->default_stock->bahan_baku }}</span>
                                                </p>
                                            </div>
                                            <!-- Content -->
                                            <p class=" text-gray-100 text-xs mt-3">
                                                Jumlah Tersedia <br> <strong
                                                    class="text-xs text-red-500 underline-offset-1">{{ $item->jumlah_stock }}
                                                </strong>{{ $item->satuan }}
                                            </p>

                                        </div>
                                    @endforeach
                                    @foreach ($stock_akhir_air_s as $item)
                                        <div
                                            class="w-full bg-gray-700 border rounded-lg border-gray-700 p-2 shadow hover:bg-gray-700 delay-100 duration-200">
                                            <!-- Header -->
                                            <div class="flex flex-row">
                                                <p class="ml-3">
                                                    <span
                                                        class="text-gray-100 text-md font-semibold">{{ $item->default_bahan_air->bahan_baku }}</span>
                                                </p>
                                            </div>
                                            <!-- Content -->
                                            <p class=" text-gray-100 text-xs mt-3">
                                                Jumlah Tersedia <br> <strong
                                                    class="text-xs text-red-500 underline-offset-1">{{ $item->jumlah_stock }}
                                                </strong>{{ $item->satuan }}
                                            </p>

                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div
                                    class="shadow overflow-hidden sm:rounded-md grid grid-cols-1 md:grid-cols-6 gap-4">
                                    @php
                                        $stock_awal = session('stockbahan');
                                        $stock_awal_air = session('stockbahanAir');
                                    @endphp
                                    @foreach ($stock_awal as $item)
                                        <div
                                            class="w-full bg-gray-700 border rounded-lg border-gray-700 p-2 shadow hover:bg-gray-700 delay-100 duration-200">
                                            <!-- Header -->
                                            <div class="flex flex-row">
                                                <p class="ml-3">
                                                    <span
                                                        class="text-gray-100 text-md font-semibold">{{ $item->default_stock->bahan_baku }}</span>
                                                </p>
                                            </div>
                                            <!-- Content -->
                                            <p class=" text-gray-100 text-xs mt-3">
                                                Jumlah Tersedia <br> <strong
                                                    class="text-xs text-red-500 underline-offset-1">{{ $item->jumlah_stock }}
                                                </strong>{{ $item->satuan }}
                                            </p>

                                        </div>
                                    @endforeach
                                    @foreach ($stock_awal_air as $item)
                                        <div
                                            class="w-full bg-gray-700 border rounded-lg border-gray-700 p-2 shadow hover:bg-gray-700 delay-100 duration-200">
                                            <!-- Header -->
                                            <div class="flex flex-row">
                                                <p class="ml-3">
                                                    <span
                                                        class="text-gray-100 text-md font-semibold">{{ $item->default_bahan_air->bahan_baku }}</span>
                                                </p>
                                            </div>
                                            <!-- Content -->
                                            <p class=" text-gray-100 text-xs mt-3">
                                                Jumlah Tersedia <br> <strong
                                                    class="text-xs text-red-500 underline-offset-1">{{ $item->jumlah_stock }}
                                                </strong>{{ $item->satuan }}
                                            </p>

                                        </div>
                                    @endforeach
                                </div>
                            @endif

                        </div>
                    </div>

                </div>
                @endif

                @if ($Stock_akhir)

                    <div class=" md:col-span-2 ">
                        <div
                            class="w-full h-14 pt-2 text-center  bg-gray-700  shadow overflow-hidden sm:rounded-md font-bold text-md text-white ">
                            Stock Akhir
                        </div>
                        <section class="text-gray-600 body-font  m-0 p-0 relative mb-1"></section>
                        <div class="container mx-auto mb-10">
                            <div class="mt-10 md:mt-0 md:col-span-2">
                                <div
                                    class="shadow overflow-hidden sm:rounded-md grid grid-cols-1 md:grid-cols-6 gap-4">
                                    @foreach ($stock_akhir as $item)
                                        <div
                                            class="w-full bg-gray-700 border rounded-lg border-gray-700 p-2 shadow hover:bg-gray-700 delay-100 duration-200">
                                            <!-- Header -->
                                            <div class="flex flex-row">
                                                <p class="ml-3">
                                                    <span
                                                        class="text-gray-100 text-md font-semibold">{{ $item->default_stock->bahan_baku }}</span>
                                                </p>
                                            </div>
                                            <!-- Content -->
                                            <p class=" text-gray-100 text-xs mt-3">
                                                Jumlah Tersedia <br> <strong
                                                    class="text-xs text-red-500 underline-offset-1">{{ $item->jumlah_stock }}
                                                </strong>{{ $item->satuan }}
                                            </p>

                                        </div>
                                    @endforeach
                                    @foreach ($stock_akhir_air as $item)
                                        <div
                                            class="w-full bg-gray-700 border rounded-lg border-gray-700 p-2 shadow hover:bg-gray-700 delay-100 duration-200">
                                            <!-- Header -->
                                            <div class="flex flex-row">
                                                <p class="ml-3">
                                                    <span
                                                        class="text-gray-100 text-md font-semibold">{{ $item->default_bahan_air->bahan_baku }}</span>
                                                </p>
                                            </div>
                                            <!-- Content -->
                                            <p class=" text-gray-100 text-xs mt-3">
                                                Jumlah Tersedia <br> <strong
                                                    class="text-xs text-red-500 underline-offset-1">{{ $item->jumlah_stock }}
                                                </strong>{{ $item->satuan }}
                                            </p>

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                @endif

            </section>
        </div>
    </div>
</div>
</div>
<!-- Add Item Modal -->
