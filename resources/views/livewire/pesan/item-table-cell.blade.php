@foreach ($bb as $item)
    <tr>
        <td class="border border-black">{{ $item->default_bahan_air->bahan_baku }}</td>
        <td class="border border-black">{{ $item->harga }}</td>
        <td class="border border-black">{{ $item->jumlah_stock }}</td>
        <td class="border border-black">
            <a href="#_" wire:click='Pesan({{$item->id}})'
                class="inline-flex items-center justify-center px-2 py-3 text-base font-medium text-center text-indigo-100 border rounded-lg shadow-sm cursor-pointer hover:text-white bg-black">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                <span class="relative">Pesan</span>
            <a href="#_"
                class="inline-flex items-center justify-center px-2 py-3 text-base font-medium text-center text-indigo-100 border rounded-lg shadow-sm cursor-pointer hover:text-white bg-black">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                <span class="relative">Chat Wa</span>
            </a>
        </td>
    </tr>
@endforeach
