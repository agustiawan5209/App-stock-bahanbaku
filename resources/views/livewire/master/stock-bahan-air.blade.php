<div class="animate__animated animate__fadeIn">
    <div  id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
       <div class="w-full overflow-hidden">
           <div class="w-full overflow-x-auto">
            @if(session()->has('message'))
            <div class="bg-blue-600 border border-gray-400 text-gray-50 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Peberitahuan</strong>
                <span class="block sm:inline">{{session('message')}}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                  <svg class="fill-current h-6 w-6 text-gray-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
              </div>
            @endif
            @if ($ModalEdit)
                @include('livewire.user.metode.edit-stock')
            @endif
            <table  class="stripe hover w-full whitespace-no-wrap" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-100">
                    <tr>
                        <th class="px-4 py-3" data-priority="5">No</th>
                        {{-- <th class="px-4 py-3" data-priority="3">Gambar</th> --}}
                        <th class="px-4 py-3" data-priority="1">Bahan Baku</th>
                        <th class="px-4 py-3" data-priority="2">Satuan</th>
                        <th class="px-4 py-3" data-priority="2">Jumlah Stock</th>
                        <th class="px-4 py-3" data-priority="1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bahanbaku as $item)
                        <tr>
                            <td class="border border-gray-300 text-center">{{ $loop->iteration }}</td>
                            {{-- <td class="border border-gray-300 text-center"><img width="100" src="{{ asset('storage/upload/'. $item->default_bahan_air->gambar) }}" alt=""></td> --}}
                            <td class="border border-gray-300 text-center">{{ $item->default_bahan_air->bahan_baku }}</td>
                            <td class="border border-gray-300 text-center">{{ $item->satuan }}</td>
                            <td class="border border-gray-300 text-center">{{ $item->jumlah_stock }}</td>
                            <td class="border border-gray-300 text-center" class="border border-gray-100 text-xs">
                                <ul class="flex justify-around">
                                   {{-- @include('components.action.delete', ['value' => $item->id]) --}}
                                   <x-button wire:click='ModalEdit({{$item->id}})'><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></x-button>
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

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    h
</script>
