<li
    class="relative px-3 py-1 inline-flex items-center w-full {!! request()->routeIs('Admin.nav.BarangMasukPacking') ? 'bg-gradient-to-r from-dark to-black rounded-lg text-white ':'text-dark' !!} text-sm transition-colors duration-150">
    <a href="{{route('Admin.nav.BarangMasukPacking')}}" class="inline-flex item-center">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path></svg>
    <div>Barang Masuk Packaging</div>
    </a>
</li>
<li
    class="relative px-3 py-1 inline-flex items-center w-full {!! request()->routeIs('Admin.nav.BarangMasukAir') ? 'bg-gradient-to-r from-dark to-black rounded-lg text-white ':'text-dark' !!} text-sm transition-colors duration-150">
    <a href="{{route('Admin.nav.BarangMasukAir')}}" class="inline-flex item-center">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path></svg>
    <div>Barang Masuk Air</div>
    </a>
</li>
<li
    class="relative px-3 py-1 inline-flex items-center w-full {!! request()->routeIs('Admin.nav.BarangKeluar') ? 'bg-gradient-to-r from-dark to-black rounded-lg text-white ':'text-dark' !!} text-sm transition-colors duration-150">
    <a href="{{route('Admin.nav.BarangKeluar')}}" class="inline-flex item-center">
    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4"></path></svg>
    <div>Barang Keluar</div>
    </a>
</li>
{{-- <li
    class="relative px-3 py-1 inline-flex items-center w-full {!! request()->routeIs('Admin.nav.Pemesanan Barang') ? 'bg-gradient-to-r from-dark to-black rounded-lg text-white ':'text-dark' !!} text-sm transition-colors duration-150">
    <a href="{{route('Admin.nav.Pemesanan Barang')}}" class="inline-flex item-center">
    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path></svg>
    <div>Pemesanan Barang</div>
    </a>
</li> --}}
