<div class="animate__animated animate__fadeIn">
    <div  id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

        <a href="{{route('Cetak-Stock')}}">
            <x-button>
                cetak
            </x-button></a>
        <table class="stripe hover w-full whitespace-no-wrap" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead >
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-50">
                    <th class="px-4 py-3 text-center text-dark border border-gray-300">No</th>
                    {{-- <th class="px-4 py-3 text-center text-dark border border-gray-300">Gambar</th> --}}
                    <th class="px-4 py-3 text-center text-dark border border-gray-300">Bahan Baku</th>
                    <th class="px-4 py-3 text-center text-dark border border-gray-300">Jumlah Stock</th>
                    <th class="px-4 py-3 text-center text-dark border border-gray-300">Satuan</th>
                    {{-- <th class="px-4 py-3 text-center text-dark border border-gray-300">Terakhir Update</th> --}}
                    {{-- <th class="px-4 py-3 text-center text-dark border border-gray-300">Action</th> --}}
                </tr>
            </thead>
            <tbody>@php
                $no =1;
            @endphp
                @foreach ($bahanbaku as $item)
                    <tr>
                        <td class=" border border-gray-300 text-base font-semibold text-center" class=" w-10">{{ $no++ }}</td>
                        {{-- <td class=" border border-gray-300 text-base font-semibold text-center"><img width="100" src="{{ asset('storage/upload/'.$item->default_stock->gambar) }}" alt=""></td> --}}
                        <td class=" border border-gray-300 text-base font-semibold text-center">{{ $item->default_stock->bahan_baku }}</td>
                        <td class=" border border-gray-300 text-base font-semibold text-center">{{ $item->jumlah_stock }} </td>
                        <td class=" border border-gray-300 text-base font-semibold text-center">{{ $item->satuan }}</td>
                        {{-- <td class=" border border-gray-300 text-base font-semibold text-center">{{ $item->created_at }}</td> --}}
                        {{-- <td class=" border border-gray-300 text-base font-semibold text-center">
                            <ul class="flex justify-around"> --}}
                               {{-- @include('components.action.delete', ['value' => $item->id]) --}}
                               {{-- @include('components.action.edit', ['value' => $item->id , 'table'=> $item])
                            </ul>
                        </td> --}}
                    </tr>
                @endforeach
                @foreach ($bahanbakuAir as $item)
                    <tr>
                        <td class=" border border-gray-300 text-base font-semibold text-center" class=" w-10">{{ $no++ }}</td>
                        {{-- <td class=" border border-gray-300 text-base font-semibold text-center"><img width="100" src="{{ asset('storage/upload/'.$item->default_bahan_air->gambar) }}" alt=""></td> --}}
                        <td class=" border border-gray-300 text-base font-semibold text-center">{{ $item->default_bahan_air->bahan_baku }}</td>
                        <td class=" border border-gray-300 text-base font-semibold text-center">{{ $item->jumlah_stock }}</td>
                        <td class=" border border-gray-300 text-base font-semibold text-center">{{ $item->satuan }}</td>
                        {{-- <td class=" border border-gray-300 text-base font-semibold text-center">{{ $item }}</td> --}}
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>

</script>
