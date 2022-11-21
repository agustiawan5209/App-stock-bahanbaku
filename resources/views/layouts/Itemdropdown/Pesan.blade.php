<li
    class="relative px-3 py-1 inline-flex items-center w-full text-xs {!! request()->routeIs('Admin.pesan.packing') ? 'bg-gradient-to-r from-dark to-black rounded-lg text-white ': 'text-dark' !!} text-sm transition-colors duration-150">
    <a href="{{route('Admin.pesan.packing')}}" class="inline-flex item-center">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path></svg>
    <div class="text-xs">Pesan Bahan Baku Packaging</div>
    </a>
</li>
<li
    class="relative px-3 py-1 inline-flex items-center w-full text-xs {!! request()->routeIs('Admin.pesan.Air') ? 'bg-gradient-to-r from-dark to-black rounded-lg text-white ': 'text-dark' !!} text-sm transition-colors duration-150">
    <a href="{{route('Admin.pesan.Air')}}" class="inline-flex item-center">
    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4"></path></svg>
    <div class="text-xs">Pesan Bahan Baku Air</div>
    </a>
</li>
