<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @if ($Alert)
            <div x-data='{openTab : 0}' class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
                <div
                    class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                        role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <form>
                            <div class="bg-white flex justify-center px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="">
                                    <div class="w-full flex justify-center"><img width='50'
                                            class="bg-red-500 rounded-lg"
                                            src="{{ asset('img/alert/icons8-error.gif') }}" alt=""></div>
                                    </p>
                                    <div class="mb-4">
                                        <label for="exampleFormControlInput1"
                                            class="block text-gray-700 text-sm font-bold mb-2">{{ session('message') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                    <button wire:click="closeModal()" type="button"
                                        class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Tutup
                                    </button>
                                </span>
                        </form>
                    </div>
                </div>
            </div>

        @endif
        <div  class="w-full mb-14">
            {{-- <div class="flex flex-wrap rounded-lg py-3 px-4 border border-[#E4E4E4] ">
                <?php $IDTAB = 1;
                $Tab = 1;
                $targetTab = 1; ?>
                <a href="javascript:void(0)" @click="openTab = 0"
                    :class="openTab === 0 ? activeClasses : inactiveClasses"
                    class="text-sm md:text-base font-medium rounded-md py-3 px-4 lg:px-6 hover:bg-blue-400 hover:text-white">
                    Semua
                </a>
                @foreach ($tbSupplier as $item)
                    <a href="javascript:void(0)" @click="openTab = {{ $item->id }}"
                        wire:click='TabID({{ $item->id }})'
                        :class="openTab === {{ $Tab++ }} ? activeClasses : inactiveClasses"
                        class="text-sm md:text-base font-medium rounded-md py-3 px-4 lg:px-6 hover:bg-blue-400 hover:text-white">
                        {{ $item->supplier }}
                    </a>
                @endforeach
            </div> --}}
            <div>
                <div class="grid gap-2 grid-cols-2 md:grid-cols-6">
                    @foreach ($BB as $key => $val)
                        <div class="col-span-2 flex items-center p-4 bg-white rounded-lg shadow-lg">
                            <!-- Itam -->
                            <div class="p-3 mr-4 text-orange-500 bg-transparent rounded-full ">
                                <img class="w-24 bg-cover shadow-sm border-2 border-blue-500 rounded-lg"
                                    src="{{ asset('upload/' . $val->gambar) }}" />
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600">
                                    <span class=" font-bold px-2 py-2 bg-black text-white rounded-md whitespace-pre"> Supplier : {{ $val->supplier->supplier }}</span><br> <br>
                                    {{ $val->default_bahan_air->bahan_baku }}
                                </p>
                                <p class="border-b border-black text-sm font-light text-gray-600">Deskripsi Produk
                                </p>
                                <p class="text-sm font-semibold text-gray-700">
                                    Satuan : {{ $val->isi }}/{{ $val->satuan }} <br>
                                    Harga : Rp . {{ number_format($val->harga, 0, 2) }} <br>
                                    Jumlah Stock : {{ number_format($val->jumlah_stock, 0, 2) }} <br>

                                    <button wire:click='Pesan({{ $val->id }})'
                                        class="px-3 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded">Pesan</button>
                                    <button wire:click='ChatWa({{ $val->suppliers_id }})'
                                        class="px-3 py-2 bg-green-400 text-white text-xs font-bold uppercase rounded">Chat
                                        Via Wa</button>
                                </p>
                            </div>
                        </div>
                    @endforeach
                    {{-- @if ($IDtabOpen == false)
                    @elseif($IDtabOpen == true)
                        @foreach ($itemTab as $key => $val)
                            <div x-show="openTab === {{ $val->suppliers_id }}"
                                class="col-span-2 flex items-center p-4 bg-white rounded-lg shadow-lg">
                                <div class="p-3 mr-4 text-orange-500 bg-transparent rounded-full ">
                                    <img class="w-24 bg-cover shadow-sm border-2 border-blue-500 rounded-lg"
                                        src="{{ asset('upload/' . $val->gambar) }}" />
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600">
                                        {{ $val->default_stock->bahan_baku }} <br>
                                        Supplier : {{ $val->supplier->supplier }}
                                    </p>
                                    <p class="text-lg font-semibold text-gray-700">
                                        Harga : Rp . {{ number_format($val->harga, 0, 2) }} <br>
                                        Jumlah Stock :{{ number_format($val->jumlah_stock, 0, 2) }} <br>
                                        <button wire:click='Pesan({{ $val->id }})'
                                            class="px-3 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded">Pesan</button>
                                        <button wire:click='ChatWa({{ $val->suppliers_id }})'
                                            class="px-3 py-2 bg-green-400 text-white text-xs font-bold uppercase rounded">Chat
                                            Via Wa</button>
                                    </p>
                                </div>
                            </div>
                        @endforeach --}}
                    {{-- @endempty --}}
                    {{-- <div x-show="openTab === 2" class="text-body-color text-base leading-relaxed p-6" style="display: none;">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Officia nisi, doloribus nulla cumque molestias corporis eaque
                        harum vero! Quas sit odit optio debitis nulla quisquam,
                        dolorum quaerat animi iusto quod. Lorem ipsum dolor, sit amet
                        consectetur adipisicing elit. Unde ex dolorum voluptate
                        cupiditate adipisci doloremque, vel quam praesentium nihil
                        veritatis.
                     </div> --}}
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Add Item Modal -->
<x-jet-dialog-modal wire:model="Additem" class="bg-blue-400 hover:bg-blue-500 rounded-lg" maxWidth='xl'>
    <x-slot name="title">
        <p class="text-red-500">{{ __('Lakukan Pemesanan Bahan Baku') }}</p>
    </x-slot>

    <x-slot name="content">
        <form wire:submit.prevent>
            <div class="flex flex-row justify-around items-center">
                <div>
                    <x-jet-label for="" value="{{ __('Supplier') }}" />
                    <x-jet-input class="block mt-1 w-full" wire:model='supplier' type="text" name="Supplier"
                        required autofocus readonly />
                    @error('supplier')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-jet-label for="" value="{{ __('Nomor Telpon') }}" />
                    <x-jet-input class="block mt-1 w-full" wire:model='no_telpon' type="text" name="no_telpon"
                        required autofocus readonly />
                    @error('no_telpon')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex flex-row justify-around items-center">
                <div>
                    <x-jet-label for="" value="{{ __('bahan') }}" />
                    <x-jet-input class="block mt-1 w-full" wire:model.defer='bahan' type="text" name="bahan"
                        required autofocus readonly />
                    @error('bahan')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-jet-label for="" value="{{ __('harga') }}" />
                    <x-jet-input class="block mt-1 w-full" wire:model='harga' type="text" name="harga" required
                        autofocus readonly />
                    @error('harga')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex flex-row justify-around items-center">
                <div>
                    <x-jet-label for="" value="{{ __('Tanggal') }}" />
                    <x-jet-input class="block mt-1 w-full" wire:model='tgl' type="date" name="tgl" required readonly />
                    @error('tgl')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-jet-label for="" value="{{ __('jumlah') }}" />
                    <x-jet-input class="block mt-1 w-full" wire:model='jumlah' wire:keyup='getSubTotal' type="number"
                        name="jumlah" required autofocus />
                    @error('jumlah')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div>
                <x-jet-label for="" value="{{ __('sub_total') }}" />
                <x-jet-input class="block mt-1 w-full" wire:model='sub_total' type="text" name="sub_total" readonly
                    autofocus />
                @error('sub_total')
                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <x-jet-label for="" value="{{ __('keterangan') }}" />
                <textarea class="block mt-1 w-full rounded outline-1 outline-gray-600" wire:model.defer='keterangan' type="text"
                    name="keterangan" value='{{ $keterangan }}'> </textarea>
                @error('keterangan')
                    <span class="text-red-500 text-xs italic">{{ __('Mohon Isi Di isi') }}</span>
                @enderror
            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-jet-button class="bg-blue-500 hover:bg-blue-700 rounded mr-4" wire:click='kirim({{ $itemID }})'>
            {{ __('Lakukan Pemesanan') }}
        </x-jet-button>

        <x-jet-danger-button wire:click="$toggle('Additem')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
<!-- ====== Modal Section Start -->
<!-- ====== Modal Section End -->
