<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">

    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">



        <div class="fixed inset-0 transition-opacity">

            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>

        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​



        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <form>

                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                    <div class="mt-2">
                        <div class=" text-gray-700">
                            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md   ">
                                <label class="block text-sm">
                                    <div class="w-full flex flex-row overflow-x-auto">
                                        @if ($photo)
                                            Photo Preview:
                                            <img src="{{ $photo->temporaryUrl() }}" width="200">
                                        @else
                                            <img src="{{ asset('upload/' . $gambar) }}" width="200" alt="Item gambar">
                                        @endif

                                    </div>
                                    <span class="text-gray-700   ">Gambar</span>
                                    <input wire:model='photo' id="fileImage" type="file"
                                        class="block w-full mt-1 text-sm       focus:border-purple-400 focus:outline-none focus:shadow-outline-purple    form-input"
                                        placeholder="xxxxxxxxx" />
                                    @error('gambar')
                                        <span class="text-xs text-red-600   ">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </label>
                                <label class="block mt-4 text-sm">
                                    <span class="text-gray-700   ">
                                        Bahan Baku
                                    </span>
                                    <select wire:model='inp_bahan_id'
                                        class="block w-full mt-1 text-sm          form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple">
                                        <option value="{{$bahan_id}}">{{$bahan}}</option>
                                        @foreach ($optionAir as $item)
                                            <option value="{{ $item->id }}">{{ $item->bahan_baku }}</option>
                                        @endforeach
                                    </select>
                                    @error('inp_bahan_id')
                                    <span class="text-xs text-red-600   ">
                                        {{ $message }}
                                    </span>
                                @enderror
                                </label>
                                <div class="mt-4 text-sm">
                                    <span class="text-gray-700   ">
                                        Satuan
                                    </span>
                                    <div class="mt-2">
                                        <label class="inline-flex items-center text-gray-600   ">
                                            <input type="radio" wire:model='satuan'
                                                @if ($satuan == 'Kg') @checked(true) @endif
                                                class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple"
                                                name="accountType" value="Kg" />
                                            <span class="ml-2">Kg</span>
                                        </label>
                                        <label class="inline-flex items-center ml-6 text-gray-600   ">
                                            <input type="radio" wire:model='satuan'
                                                @if ($satuan == 'Dus') @checked(true) @endif
                                                class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple"
                                                name="accountType" value="Dus" />
                                            <span class="ml-2">Dus</span>
                                        </label>
                                        <label class="inline-flex items-center ml-6 text-gray-600   ">
                                            <input type="radio" wire:model='satuan'
                                                @if ($satuan == 'Buah') @checked(true) @endif
                                                class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple"
                                                name="accountType" value="Buah" />
                                            <span class="ml-2">Buah</span>
                                        </label>
                                        @error('satuan')
                                        <span class="text-xs text-red-600   ">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    </div>
                                    @if ($PackingItem)
                                        <label class="block text-sm">
                                            <span class="text-gray-700   ">Isi</span>
                                            <input type="number" wire:model='isi'
                                                class="block w-full mt-1 text-sm       focus:border-purple-400 focus:outline-none focus:shadow-outline-purple    form-input"
                                                placeholder="xxxxxxxxx" />
                                            @error('isi')
                                                <span class="text-xs text-red-600   ">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </label>
                                    @endif
                                    <label class="block text-sm">
                                        <span class="text-gray-700   ">Jumlah Stock tersedia</span>
                                        <input type="number" wire:model='jumlah_stock'
                                            class="block w-full mt-1 text-sm       focus:border-purple-400 focus:outline-none focus:shadow-outline-purple    form-input"
                                            placeholder="xxxxxxxxx" />
                                        @error('jumlah_stock')
                                            <span class="text-xs text-red-600   ">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </label>
                                    <label class="block text-sm">
                                        <span class="text-gray-700   ">Harga</span>
                                        <input type="number" wire:model='harga'
                                            class="block w-full mt-1 text-sm       focus:border-purple-400 focus:outline-none focus:shadow-outline-purple    form-input"
                                            placeholder="xxxxxxxxx" />
                                        @error('harga')
                                            <span class="text-xs text-red-600   ">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">

                        @if ($PackingItem)
                            <button wire:click.prevent="Update({{ $ItemId }})" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">

                                Save

                            </button>
                            @else
                            <button wire:click.prevent="UpdateAir({{ $ItemId }})" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">

                            Save

                        </button>
                        @endif

                    </span>

                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">



                        <button wire:click="CloseModal()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">

                            Cancel

                        </button>

                    </span>
                </div>
            </form>

        </div>



    </div>

</div>

</div>
