<div class="container">
    <div class="py-2 px-4 mb-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-10">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                @if ($StockKurang != null)
                    @foreach ($StockKurang as $item)
                        <div class="flex items-center bg-yellow-300 text-white text-sm font-bold px-4 py-3" role="alert"
                            wire:click='closeAlert'>
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                            </svg>
                            <p> Stock Pada Bahan Baku {{ $item->default_stock->bahan_baku }} </p>
                        </div>
                    @endforeach
                @endif
                @if ($StockKurangAir != null)
                    @foreach ($StockKurangAir as $item)
                        <div class="flex items-center bg-yellow-300 text-white text-sm font-bold px-4 py-3" role="alert"
                            wire:click='closeAlert'>
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                            </svg>
                            <p>{{ $item->default_bahan_air->bahan_baku }}</p>
                        </div>
                    @endforeach
                @endif
                {{-- Modal Insert Item --}}
                <div class="p-4">
                    <x-jet-button wire:click="openModal" wire:loading.attr="disabled">
                        {{ __('Tambah Bahan Baku') }}
                    </x-jet-button>

                    <!-- Add Item Modal -->
                    <x-dialog-modal wire:model="modal" maxWidth='7xl'>
                        <form>
                            @csrf
                            <x-slot name="title">
                                {{ __('Tambahlan Bahan Baku') }}
                            </x-slot>

                            <x-slot name="content">
                                <div action="#" class="mx-auto  rounded-md flex flex-col sm:flex-row sm:justify-evenly"
                                    x-data="{ IsData: false, IsSatuan: '', }">
                                    <div class="p-6 flex flex-col border-2 bg-white rounded-lg  border-red-50">
                                        <div class="p-2 rounded">
                                            <div class="flex justify-center">
                                                <div class="mb-3 max-w-full">
                                                    <label for="formFile"
                                                        class="form-label inline-block mb-2 text-gray-700">Masukkan
                                                        Gambar</label>
                                                    <input
                                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                        type="file" id="formFile" wire:model='gambar'
                                                        accept="image/png, image/gif, image/jpeg">
                                                </div>
                                                <div wire:loading wire:target="gambar">Uploading...</div>
                                                @error('gambar')
                                                    <p class="text-red-500 text-xs italic">Mohon Di Isi.</p>
                                                @enderror
                                            </div>
                                            <x-jet-label for="input" value="{{ __('Bahan Baku') }}" />
                                            <select id="supplier"
                                                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 rounded shadow focus:outline-none focus:shadow-outline"
                                                wire:model.lazy='bahan' name="bahan">
                                                <option value="--">--Pilih--</option>
                                                @empty($def)
                                                    |
                                                @else
                                                    @foreach ($def as $defs)
                                                        <option value='{{ $defs->id }}'>{{ $defs->bahan_baku }}
                                                        </option>
                                                    @endforeach
                                                @endempty
                                            </select>
                                            @error('bahan')
                                                <p class="text-red-500 text-xs italic">Mohon Di Isi.</p>
                                            @enderror
                                        </div>


                                        <div x-show="IsData">
                                            <x-jet-label for="input" class="text-base">Isi Satu <span
                                                    x-text="IsSatuan"></span>
                                            </x-jet-label>
                                            <x-jet-input id="input" wire:model='isi' class="block mt-1 w-full"
                                                type="number" name="input" required autofocus />
                                            @error('isi')
                                                <p class="text-red-500 text-xs italic">Mohon Di Isi.</p>
                                            @enderror

                                        </div>
                                        <x-jet-label for="input" class="text-base">Harga Satu <span
                                                x-text="IsSatuan"></span></x-jet-label>
                                        <x-jet-input id="input" wire:model='harga' class="block mt-1 w-full"
                                            type="number" name="input" required autofocus />
                                        @error('harga')
                                            <p class="text-red-500 text-xs italic">Mohon Di Isi.</p>
                                        @enderror
                                        <x-jet-label for="input" value="{{ __('Jumlah Stock Yang Tersedia') }}" />
                                        <x-jet-input id="input" wire:model='jumlah_stock' class="block mt-1 w-full"
                                            type="number" name="input" required autofocus />
                                        @error('jumlah_stock')
                                            <p class="text-red-500 text-xs italic">Mohon Di Isi.</p>
                                        @enderror
                                    </div>

                                    <!-- address start -->
                                    <div class="p-6 border-2 bg-white rounded-lg  border-red-50">
                                        <div class="block p-6 rounded-lg shadow-lg bg-red-500 max-w-md">
                                            <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">Mohon
                                                Diperhatikan</h5>
                                            <div class="mt-4 text-sm">
                                                <span class="text-gray-700   ">
                                                    Jenis Bahan Baku
                                                </span>
                                                <div class="mt-2">
                                                    <label class="inline-flex items-center text-gray-600   ">
                                                        <input type="radio" wire:model='satuan' wire:click="getBahan"
                                                            @click="IsData = true"
                                                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple"
                                                            value="1" />
                                                        <span class="ml-2 text-white">Bahan Baku Packaging</span>
                                                    </label>
                                                    <label class="inline-flex items-center text-gray-600   ">
                                                        <input type="radio" wire:model='satuan' wire:click="getBahan"
                                                            @click="IsData = false"
                                                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple"
                                                            value="2" />
                                                        <span class="ml-2 text-white">Bahan Baku Air</span>
                                                    </label> <br>
                                                    @error('satuan')
                                                        <p class="text-white text-xs italic">Mohon Di Isi.</p>
                                                    @enderror
                                                </div>
                                                </p>
                                            </div>
                                            <div class="mt-4 text-sm">
                                                <span class="text-gray-700   ">
                                                    Satuan Bahan Baku
                                                </span>
                                                <div class="mt-2">
                                                    <label class="inline-flex items-center text-gray-600   ">
                                                        <input type="radio" wire:model="Status_id" wire:click="getBahan"
                                                            @click="IsSatuan = 'Dus'"
                                                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple"
                                                            value="Dus" />
                                                        <span class="ml-2 text-white">Dus</span>
                                                    </label>
                                                    <label class="inline-flex items-center text-gray-600   ">
                                                        <input type="radio" wire:model="Status_id" wire:click="getBahan"
                                                            @click="IsSatuan = 'Kg'"
                                                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple"
                                                            value="Kg" />
                                                        <span class="ml-2 text-white">Kg</span>
                                                    </label> <br>
                                                    @error('Status_id')
                                                        <span class="ml-2 text-white">Mohon Di Pilih</span>
                                                    @enderror
                                                </div>
                                                </p>
                                            </div>
                                        </div>
                                        <!-- address End -->
                                    </div>
                            </x-slot>

                            <x-slot name="footer">
                                <x-jet-danger-button wire:click="$toggle('modal')" wire:loading.attr="disabled">
                                    {{ __('Cancel') }}
                                    </x-jet-button>
                                    <x-jet-button wire:click.prevent="submit()" name="simpan" type="button">
                                        {{ __('Tambah Data') }}
                                    </x-jet-button>
                            </x-slot>
                        </form>
                    </x-jet-dialog-modal>
                </div>
                {{-- <livewire:datatable.bahanbaku-table> --}}

                <h1></h1>
            </div>
        </div>
    </div>
    <!-- component -->
    @if ($AirItem)
        @include('components.action.supplier.edit')
    @endif
    @if (session()->has('message'))
        <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert"
            wire:click='closeAlert'>
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
            </svg>
            <p>{{ session('message') }}</p>
        </div>
    @endif
    <div class=" container lg:px-4 md:px-2 sm:px1">
        @if ($bahanbaku != null)
            <div class="w-full h-auto px-2 py-2 bg-blue-200 rounded-sm overflow-x-auto">
                    <div class=" w-full md:w-1/2 shadow-md bg-gray-50 px-3 md:px-6 rounded-lg">
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
                <div class="w-full overflow-hidden">
                    <div class="w-full overflow-x-auto">
                        <table
                            class="stripe hover w-full whitespace-no-wrap mt-10 shadow-sm px-2 border-separate border-white"
                            style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                            <thead
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-50">
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-50">
                                    <th class="font-semibold p-2 text-center text-dark">No</th>
                                    <th class="font-semibold p-2 text-center text-dark">gambar</th>
                                    <th class="font-semibold p-2 text-center text-dark">Bahan Baku</th>
                                    <th class="font-semibold p-2 text-center text-dark">isi</th>
                                    <th class="font-semibold p-2 text-center text-dark">Satuan</th>
                                    <th class="font-semibold p-2 text-center text-dark">Harga</th>
                                    <th class="font-semibold p-2 text-center text-dark">Jumlah Stock</th>
                                    <th class="font-semibold p-2 text-center text-dark">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>@php
                                $no = 1;
                            @endphp
                                @foreach ($bahanbaku as $item)
                                    <tr class="text-xs font-medium tracking-wide text-left text-black  border-b   bg-white"
                                        wire:loading.class.delay.500ms='opacity-50'>
                                        <td class="border border-gray-100 text-xs bg-white text-center">
                                            {{ $no++ }}
                                        </td>
                                        <td class="border border-gray-100 text-xs bg-white text-center"><img width="100"
                                                src="{{ asset('upload/' . $item->gambar) }}" alt=""></td>
                                        <td class="border border-gray-100 text-xs bg-white text-center">
                                            {{ $item->default_stock->bahan_baku }}</td>
                                        <td class="border border-gray-100 text-xs bg-white text-center">
                                            {{ $item->isi }}
                                        </td>
                                        <td class="border border-gray-100 text-xs bg-white text-center">
                                            {{ $item->satuan }}
                                        </td>
                                        <td class="border border-gray-100 text-xs bg-white text-center">Rp.
                                            {{ number_format($item->harga, 0, 2) }}</td>
                                        <td class="border border-gray-100 text-xs bg-white text-center">
                                            {{ $item->jumlah_stock }}</td>
                                        <td class="border border-gray-100 text-xs bg-white text-center">
                                            <ul class="flex justify-around">
                                                <li> @include('components.action.supplier.delete', [
                                                    'value' => $item->id,
                                                    'table' => 'BahanBaku',
                                                ])</li>
                                                <li><button wire:click='Edit({{ $item->id }}, "BahanBaku")'><svg
                                                            class="w-6 h-6 text-green-500 active:bg-green-600"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                            </path>
                                                        </svg></button>
                                                </li>
                                            </ul>

                                        </td>
                                    </tr>
                                @endforeach
                                @foreach ($bahanAir as $item)
                                    <tr class="text-xs font-medium tracking-wide text-left text-black  border-b   bg-gray-300"
                                        wire:loading.class.delay.500ms='opacity-50'>
                                        <td class="border border-gray-100 text-xs bg-white text-center">
                                            {{ $no++ }}
                                        </td>
                                        <td class="border border-gray-100 text-xs bg-white text-center"><img width="100"
                                                src="{{ asset('upload/' . $item->gambar) }}" alt=""></td>
                                        <td class="border border-gray-100 text-xs bg-white text-center">
                                            {{ $item->default_bahan_air->bahan_baku }}</td>
                                        <td class="border border-gray-100 text-xs bg-white text-center">Isi</td>
                                        <td class="border border-gray-100 text-xs bg-white text-center">
                                            {{ $item->satuan }}
                                        </td>
                                        <td class="border border-gray-100 text-xs bg-white text-center">Rp.
                                            {{ number_format($item->harga, 0, 2) }}</td>
                                        <td class="border border-gray-100 text-xs bg-white text-center">
                                            {{ $item->jumlah_stock }}</td>
                                        <td class="border border-gray-100 text-xs bg-white text-center">
                                            <ul class="flex justify-around">
                                                <li> @include('components.action.supplier.delete1', [
                                                    'value' => $item->id,
                                                    'table' => 'BahanBakuAir',
                                                ])</li>
                                                <li><button wire:click='Edit({{ $item->id }}, "BahanBakuAir")'>
                                                        <svg class="w-6 h-6 text-green-500 active:bg-green-600"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </li>
                                            </ul>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        @endif
        <hr class="w-full h-16 bg-white stroke-1 stroke-current ">
        {{-- @if ($bahanAir != null)
            <div class="w-full h-auto px-2 py-2 bg-green-200 rounded-sm overflow-x-auto">
                <h3 class="bg-white px-2 p-2 lg:px-4 lg:py-4 font-normal text-gray-600">Tabel Bahan Baku Produksi Air
                </h3>
                <table class="stripe hover w-full whitespace-no-wrap mt-10 shadow-sm px-2 border-collapse border-white"
                    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-50">
                        <tr>
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">gambar</th>
                            <th class="px-4 py-3">Bahan Baku</th>
                            <th class="px-4 py-3">Satuan</th>
                            <th class="px-4 py-3">Harga</th>
                            <th class="px-4 py-3">Jumlah Stock</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp

                    </tbody>

                </table>

            </div>
        @endif --}}
    </div>
    <script></script>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
