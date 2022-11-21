<div class="container grid px-6 mx-auto">

    <div class="w-full mb-8 mt-5 overflow-hidden rounded-lg shadow-xs">
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
                            <div class="w-full flex justify-center"></div>
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
        @if (session()->has('error'))
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
                                {{ session('error') }}
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
        <div class="md:flex items-start bg-primary rounded-lg justify-center py-12 2xl:px-20 md:px-6 px-4">
            <div class="xl:w-2/6 lg:w-2/5 w-80 md:block hidden shadow-sm rounded-sm">
                <img class="w-full rounded-lg" alt="image of a girl posing "
                    src="{{ asset('img/blog/WhatsApp Image 2022-06-05 at 03.55.45 (1).jpeg') }}" />
                <img class="mt-6 w-full rounded-lg" alt="image of a girl posing shadow-sm"
                    src="{{ asset('img/blog/WhatsApp Image 2022-06-05 at 03.55.45.jpeg') }}" />
            </div>
            <div class="md:hidden">
                <img class="w-full" alt="image of a girl posing shadow-sm"
                    src="{{ asset('img/blog/WhatsApp Image 2022-06-05 at 03.55.46 (1).jpeg') }}" />
                <div class="flex items-center justify-between mt-3 space-x-4 md:space-x-0">
                    <img alt="image-tag-one" class="md:w-48 md:h-48 w-full"
                        src="{{ asset('img/blog/WhatsApp Image 2022-06-05 at 03.55.46 (2).jpeg') }}" />
                    <img alt="image-tag-one" class="md:w-48 md:h-48 w-full"
                        src="{{ asset('img/blog/WhatsApp Image 2022-06-05 at 03.55.46.jpeg') }}" />
                    <img alt="image-tag-one" class="md:w-48 md:h-48 w-full"
                        src="{{ asset('img/blog/WhatsApp Image 2022-06-05 at 03.55.46 (2).jpeg') }}" />
                    <img alt="image-tag-one" class="md:w-48 md:h-48 w-full"
                        src="{{ asset('img/blog/WhatsApp Image 2022-06-05 at 03.55.46.jpeg') }}" />
                </div>
            </div>
            <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
                <div class="border-b border-gray-200 pb-6">
                    <h1
                        class="lg:text-2xl text-xl font-semibold lg:leading-6 leading-7 text-gray-800 dark:text-white mt-2">
                        Air MIneral Haudz</h1>
                    <h4 class="px-4">Jumlah Produksi Air Minum Yang Tersedia </h4>
                    <h3 class="px-4 py-1 bg-dark text-white  font-bold w-32 rounded-sm border-b border-dark">
                        {{ $max }} Dus</h3>
                </div>
                <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                    <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Size</p>
                    <div class="flex items-center justify-center">
                        <p class="text-sm leading-none text-gray-600 dark:text-gray-300">220ml</p>
                        <div class="w-6 h-6 bg-gradient-to-b from-gray-900 to-indigo-500 ml-3 mr-4 cursor-pointer">
                        </div>
                    </div>
                </div>
                <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                    <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Isi</p>
                    <div class="flex items-center justify-center">
                        <p class="text-sm leading-none text-gray-600 dark:text-gray-300 mr-3">48 Gelas</p>
                    </div>
                </div>
                <button data-menu
                    class="dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4 hover:bg-gray-700 focus:outline-none">
                    Pesan
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>
                <div id="sect" class="">
                    <form action="">
                        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md   ">
                            <label class="block text-sm">
                                <span class="text-gray-700   ">Nama Pemesan</span>
                                <!-- focus-within sets the color for the icon when input is focused -->
                                <div class="relative text-gray-500 focus-within:text-purple-600 ">
                                    <input type="text" value="{{ Auth::user()->customer->customer }}"
                                        class="block w-full pl-10 mt-1 text-sm text-black          focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"
                                        placeholder="Jane Doe" />
                                    <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700   ">Jalan</span>
                                <!-- focus-within sets the color for the icon when input is focused -->
                                <div class="relative text-gray-500 focus-within:text-purple-600 ">
                                    <input type="text" wire:model='alamat'
                                        class="block w-full pl-10 mt-1 text-sm text-black          focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"
                                        placeholder="Alamat" />
                                    <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700   ">Jumlah</span>
                                <!-- focus-within sets the color for the icon when input is focused -->
                                <div class="relative text-gray-500 focus-within:text-purple-600 ">
                                    <input type="number" wire:model='jumlah_pesanan'
                                        class="block w-full pl-10 mt-1 text-sm text-black          focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"
                                        placeholder="xxxxx" />
                                    <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                        </svg>
                                    </div>
                                </div>
                            </label>
                            <label class="block text-sm">
                                <!-- focus-within sets the color for the icon when input is focused -->
                                <div class="relative text-gray-500  focus-within:text-purple-600 ">
                                    <x-button wire:click='autocode' type="button"
                                        class=" w-full bg-dark hover:bg-black block  pl-10 mt-1">
                                        Proses </x-button>
                                    <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                                        <svg class="w-6 h-6" fill="none" stroke="white" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </label>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if ($ItemDelete)
            @include('livewire.user.customer.delete')
        @endif
        @if ($ItemDetail)
            @include('livewire.user.customer.detail')
        @endif
        @if ($ItemEdit)
            @include('livewire.user.customer.edit')
        @endif
        <br><br><br>
        <div class=" w-full overflow-hidden">
            <div class=" w-full overflow-x-auto">
                <table border="0" cellspacing="5" cellpadding="5" class="overflow-auto">
                    <tbody>
                        <tr>
                            <td colspan="1">Total</td>
                            @empty($total_date_penjualan)
                                <td class="px-4 py-3 text-sm">
                                    {{ 'Rp. ' . number_format(intval($total_penjualan), 0, 2) }}
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
                    </tbody>
                </table>
                     @if ($ItemDetail)
                                @include('livewire.user.customer.detail')
                                @endif
                                <table id=" example" class="stripe hover w-full whitespace-no-wrap border-collapse"
                                    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                                    <thead class="">
                                        <tr
                                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-300">
                                            <th class="text-semibold p-2 text-center bg-white">No</th>
                                            <th class="text-semibold p-2 text-center bg-white">Kode Pesan</th>
                                            <th class="text-semibold p-2 text-center bg-white">Pelanggan</th>
                                            <th class="text-semibold p-2 text-center bg-white">Tanggal Pemesanan</th>
                                            <th class="text-semibold p-2 text-center bg-white">Jumlah Pemesanan</th>
                                            <th class="text-semibold p-2 text-center bg-white">Sub Total</th>
                                            <th class="text-semibold p-2 text-center bg-white">Alamat</th>
                                            <th class="text-semibold p-2 text-center bg-white">Status</th>
                                            <th class="text-semibold p-2 text-center bg-white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pesan as $item)
                                            <tr class=" text-gray-700">
                                                <td
                                                    class=" px-2 py-3 border border-gray-300 bg-white tex-xs text-center">
                                                    {{ $loop->iteration }}</td>
                                                <td
                                                    class=" px-2 py-3 border border-gray-300 bg-white tex-xs text-center">
                                                    {{ $item->kode_pesan }}</td>
                                                <td
                                                    class=" px-2 py-3 border border-gray-300 bg-white tex-xs text-center">
                                                    {{ $item->customer->customer }}</td>
                                                <td
                                                    class=" px-2 py-3 border border-gray-300 bg-white tex-xs text-center">
                                                    {{ $item->tgl_pemesanan }}</td>
                                                <td
                                                    class=" px-2 py-3 border border-gray-300 bg-white tex-xs text-center">
                                                    {{ $item->jumlah_pesanan }}</td>
                                                <td
                                                    class=" px-2 py-3 border border-gray-300 bg-white tex-xs text-center">
                                                    {{ $item->sub_total }}</td>
                                                <td
                                                    class=" px-2 py-3 border border-gray-300 bg-white tex-xs text-center">
                                                    {{ $item->alamat }}</td>
                                                <td
                                                    class=" px-2 py-3 border border-gray-300 bg-white tex-xs text-center">
                                                    {{ $item->status }}</td>


                                                <td
                                                    class=" px-2 py-3 border border-gray-300 bg-white tex-xs text-center">
                                                    <button wire:click='Detail({{ $item->id }})'
                                                        class="  active:text-native">
                                                        <svg class="w-6 h-6" fill="none" stroke="blue"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                                            </path>
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <button wire:click='deleteModal({{ $item->id }})'
                                                        class="  active:text-red-600">
                                                        <svg class="w-6 h-6 text-red-500" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <button wire:click='EditModal({{ $item->id }})'
                                                        class="  active:text-green-600">
                                                        <svg class="w-6 h-6 text-green-500" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                                    <nav aria-label="Table navigation">
                                        <ul class="inline-flex items-center">
                                            {{ $pesan->links() }}
                                        </ul>
                                    </nav>
                                </span>
            </div>
        </div>

    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {

            var table = $('#example').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });
        let elements = document.querySelectorAll("[data-menu]");
        for (let i = 0; i < elements.length; i++) {
            let main = elements[i];
            main.addEventListener("click", function() {
                let element = main.parentElement.parentElement;
                let andicators = main.querySelectorAll("svg");
                let child = element.querySelector("#sect");
                child.classList.toggle("hidden");
                andicators[0].classList.toggle("rotate-180");
            });
        }
    </script>
</div>
