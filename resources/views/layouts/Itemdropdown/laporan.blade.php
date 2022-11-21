<li
    class="relative px-3 py-1 inline-flex items-center w-full {!! request()->routeIs('Admin.Nav.LaporanDataBahanBaku') ? 'bg-gradient-to-r from-dark to-black rounded-lg text-white ': 'text-dark' !!} text-sm transition-colors duration-150 hover:text-blue-500">
    <a href="{{route('Admin.Nav.LaporanDataBahanBaku')}}" class="inline-flex item-center">
    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
    <div>Bahan Baku layak Produksi</div>
    </a>
</li>
<li
    class="relative px-3 py-1 inline-flex items-center w-full {!! request()->routeIs('Admin.Nav.LaporanProduksiAirMineral') ? 'bg-gradient-to-r from-dark to-black rounded-lg text-white ': 'text-dark' !!} text-xs transition-colors duration-150 hover:text-blue-500 ">
    <a href="{{route('Admin.Nav.LaporanProduksiAirMineral')}}" class="inline-flex item-center">
    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path></svg>
    <div>Produksi Air Mineral</div>
    </a>
</li>
<li
    class="relative px-3 py-1 inline-flex items-center w-full {!! request()->routeIs('Admin.Nav.LaporanenjualanAirMineral') ? 'bg-gradient-to-r from-dark to-black rounded-lg text-white ': 'text-dark' !!} text-sm transition-colors duration-150 hover:text-blue-500">
    <a href="{{route('Admin.Nav.LaporanenjualanAirMineral')}}" class="inline-flex item-center">
    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
    <div>Data Penjualan</div>
    </a>
</li>
<li
    class="relative px-3 py-1 inline-flex items-center w-full {!! request()->routeIs('Admin.Nav.LaporanPembelianBahanBaku') ? 'bg-gradient-to-r from-dark to-black rounded-lg text-white ': 'text-dark' !!} text-xs transition-colors duration-150 hover:text-blue-500  text-left whitespace-no-wrap">
    <a href="{{route('Admin.Nav.LaporanPembelianBahanBaku')}}" class="inline-flex item-center">
    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
    <div>Pembelian Bahan Baku</div>
    </a>
</li>
