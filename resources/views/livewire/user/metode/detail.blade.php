<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">

    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">



        <div class="fixed inset-0 transition-opacity">

            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>

        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​



        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <form>

                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                    <div class="">

                        <div class="mb-4">

                            <div class=" bg-white lg:block">
                                <h1 class="py-6 border-b-2 text-xl text-gray-600 px-8">Detail Transaksi</h1>
                                <ul class="py-6 border-b space-y-6 px-8">
                                    <li class="grid grid-cols-6 gap-2 border-b-1">
                                        <div class="flex flex-col col-span-3 pt-2">
                                            <span class="text-gray-600 text-md font-semi-bold">Bukti Transaksi</span>
                                            <span class="text-gray-400 text-sm inline-block pt-2">
                                                <img src="{{ asset('bukti/' . $bukti_transaksi) }}"
                                                    class=" max-w-md max-h-md shadow-lg rounded" alt="">
                                            </span>
                                        </div>
                                    </li>
                                    <li class="grid grid-cols-6 gap-2 border-b-1">
                                        <div class="flex flex-col col-span-3 pt-2">
                                            <span class="text-gray-600 text-md font-semi-bold">ID Transaksi</span>
                                            <span
                                                class="text-gray-400 text-sm inline-block pt-2">{{ $ID_Transaksi }}</span>
                                        </div>
                                        <div class="col-span-2 pt-3">
                                            <div class="flex items-center space-x-2 text-sm justify-between">
                                                <span class="text-gray-400">Tanggal Transaksi</span>
                                                <span
                                                    class="text-navy font-semibold inline-block whitespace-no-wrap">{{ $tgl_transaksi }}</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="grid grid-cols-6 gap-2 border-b-1">
                                        <div class="flex flex-col col-span-3 pt-2">
                                            <span class="text-gray-600 text-md font-semi-bold">Metode Pembayaran</span>
                                            <span
                                                class="text-gray-400 text-sm inline-block pt-2">{{ $metode }}</span>
                                        </div>
                                    </li>
                                    <li class="grid grid-cols-6 gap-2 border-b-1">
                                        <div class="flex flex-col col-span-3 pt-2">
                                            <span class="text-gray-600 text-md font-semi-bold">Supplier</span>
                                            <span
                                                class="text-gray-400 text-sm inline-block pt-2">{{ $supplier }}</span>
                                        </div>
                                        <div class="col-span-2 pt-3">
                                            <div class="flex items-center space-x-2 text-sm justify-between">
                                                <span class="text-gray-400">Bahan Baku</span>
                                                <span
                                                    class="text-navy font-semibold inline-block">{{ $bahan }}</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="px-8 border-b">
                                    <div class="flex justify-between py-4 text-gray-600">
                                        <span>Jumlah</span>
                                        <span class="font-semibold text-gray-500">{{ number_format($jumlah, 0, 2) }}
                                            :{{ $satuan }}</span>
                                    </div>
                                </div>
                                <div class="font-semibold text-xl px-8 flex justify-between text-gray-600">
                                    <span>Total</span>
                                    <span>Rp. {{ number_format($sub_total, 0, 2) }}</span>
                                </div>
                                <div class="font-semibold text-xl px-8 flex justify-between text-gray-600">
                                    <span>Status Pemesanan</span>
                                    <span class="font-semibold text-gray-500">
                                        @if ($status == 'Belum Konfirmasi')
                                            {{ __('Belum Dikonfirmasi Supplier') }}
                                        @elseif ($status == 'Konfirmasi' || $status == "Selesai")
                                            {{ __('Sudah Dikonfirmasi Supplier') }}
                                            @else
                                            {{ __('Tidak Ada') }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>



                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">



                        <x-danger-button wire:click="closeModal()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-white shadow-sm hover:text-gray-50 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">

                            Tutup

                        </x-danger-button>

                    </span>

            </form>

        </div>



    </div>

</div>

</div>
