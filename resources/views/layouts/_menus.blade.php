<div class="py-4 text-gray-500 animate__animated animate__fadeInLeft">
    <a class="ml-6 text-lg font-bold text-white" href="#">
        {{ config('app.name') }}
    </a>
    <ul class="mt-6">
        <li class="relative px-6 py-3  border-b-2 shadow-inner border-dark {!! request()->routeIs('dashboard') ? 'bg-white rounded-tl-lg rounded-bl-lg hover:text-dark rounded-br-lg rounded-tr-lg' : '' !!}">
            <a data-turbolinks-action="replace"
                class="inline-flex items-center w-full {!! request()->routeIs('dashboard') ? 'text-dark' : 'text-white hover:text-gray-100' !!} text-sm font-semibold transition-colors duration-150     "
                href="{{ route('dashboard') }}">
                <svg class="w-5 h-5" ari a-hidden="true" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                <span class="ml-4">{{ __('Dashboard') }}</span>
            </a>
        </li>
        @can('Manage-Admin')

            <li class="relative px-6 py-3  border-b-2 shadow-inner border-dark {!! request()->routeIs('Admin.nav.Customer') || request()->routeIs('Admin.nav.Supplier')  || request()->routeIs('Admin.nav.Barang') ? 'bg-white rounded-tl-lg rounded-bl-lg hover:text-dark rounded-br-lg rounded-tr-lg' : '' !!}" x-data="{
                Master: false
            }">
                <a data-turbolinks-action="replace"
                    class="inline-flex items-center w-full {!! request()->routeIs('Admin.nav.Customer') || request()->routeIs('Admin.nav.Supplier')  || request()->routeIs('Admin.nav.Barang') ? 'text-dark' : 'text-white hover:text-gray-100' !!} text-sm font-semibold transition-colors duration-150  "
                    href="#" @click="Master = ! Master">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                    </svg>
                    <span class="ml-4">Master</span>
                </a>
                <ul class="ml-1 bg-white     rounded-lg animate__animated animate__fadeInLeft" x-show="Master"
                    class="hidden">
                    @include('layouts.Itemdropdown.Master')
                </ul>
            </li>
            <li class="relative px-6 py-3  border-b-2 shadow-inner border-dark {!! request()->routeIs('Admin.nav.Stock.Bahan-air') || request()->routeIs('Admin.nav.Bahan-Baku') ? 'bg-white rounded-tl-lg rounded-bl-lg hover:text-dark rounded-br-lg rounded-tr-lg' : '' !!}" x-data="{
                Stock: false}">
                <a data-turbolinks-action="replace"
                    class="inline-flex items-center w-full {!! request()->routeIs('Admin.nav.Stock.Bahan-air') || request()->routeIs('Admin.nav.Bahan-Baku') ? 'text-dark' : 'text-white hover:text-gray-100' !!} text-sm font-semibold transition-colors duration-150  "
                    href="#" @click="Stock = ! Stock">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"></path></svg>
                    <span class="ml-4">Stock</span>
                </a>
                <ul class="ml-1 bg-white     rounded-lg animate__animated animate__fadeInLeft" x-show="Stock"
                    class="hidden">
                    @include('layouts.Itemdropdown.Stock')
                </ul>
            </li>
            <li class="relative px-6 py-3  border-b-2 border-dark  {!! request()->routeIs('Admin.nav.BarangMasuk') || request()->routeIs('Admin.nav.BarangKeluar') || request()->routeIs('Admin.nav.Pemesanan Barang') ? 'bg-white rounded-tl-lg rounded-bl-lg hover:text-dark rounded-br-lg rounded-tr-lg' : '' !!}" x-data="{
                Transaksi: false
            }">
                <a data-turbolinks-action="replace"
                    class="inline-flex items-center w-full {!! request()->routeIs('Admin.nav.BarangMasuk') || request()->routeIs('Admin.nav.BarangKeluar') || request()->routeIs('Admin.nav.Pemesanan Barang') ? 'text-dark' : 'text-white hover:text-gray-100' !!}text-sm font-semibold transition-colors duration-150  "
                    href="#" @click="Transaksi = ! Transaksi">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                        </path>
                    </svg>
                    <span class="ml-4">Transaksi</span>
                </a>
                <ul class="ml-1 bg-white     rounded-lg animate__animated animate__fadeInLeft" x-show="Transaksi"
                    class="hidden">
                    @include('layouts.Itemdropdown.transaksi')
                </ul>
            </li>
            <li class="relative px-6 py-3  border-b-2 shadow-inner border-dark {!! request()->routeIs('Admin.Nav.LaporanDataBahanBaku') || request()->routeIs('Admin.Nav.LaporanenjualanAirMineral') || request()->routeIs('Admin.Nav.LaporanProduksiAirMineral') || request()->routeIs('Admin.Nav.LaporanTransaksiPemesanan') ? 'bg-white rounded-tl-lg rounded-bl-lg hover:text-dark rounded-br-lg rounded-tr-lg' : '' !!}" x-data="{
                Laporan: false
            }">
                <a data-turbolinks-action="replace"
                    class="inline-flex items-center w-full text-sm {!! request()->routeIs('Admin.Nav.LaporanDataBahanBaku') || request()->routeIs('Admin.Nav.LaporanenjualanAirMineral') || request()->routeIs('Admin.Nav.LaporanProduksiAirMineral') || request()->routeIs('Admin.Nav.LaporanTransaksiPemesanan') ? 'text-dark' : 'text-white hover:text-gray-100' !!} font-semibold transition-colors duration-150  "
                    href="#" @click="Laporan  = ! Laporan">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="ml-4">Laporan</span>
                </a>
                <ul class="ml-1 bg-white     rounded-lg animate__animated animate__fadeInLeft" x-show="Laporan"
                    class="hidden">
                    @include('layouts.Itemdropdown.laporan')
                </ul>
            </li>
            <li class="relative px-6 py-3  border-b-2 shadow-inner border-dark {!! request()->routeIs('Admin.pesan.Air') || request()->routeIs('Admin.pesan.packing') ? 'bg-white rounded-tl-lg rounded-bl-lg hover:text-dark rounded-br-lg rounded-tr-lg' : '' !!}" x-data="{
                Pesan: false
            }">
                <a data-turbolinks-action="replace"
                    class="inline-flex items-center w-full text-sm {!! request()->routeIs('Admin.pesan.Air') || request()->routeIs('Admin.pesan.packing') ? 'text-dark' : 'text-white hover:text-gray-100' !!} font-semibold transition-colors duration-150  "
                    href="#" @click="Pesan  = ! Pesan">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="ml-4">Pesan</span>
                </a>
                <ul class="ml-1 bg-white     rounded-lg animate__animated animate__fadeInLeft" x-show="Pesan"
                    class="hidden">
                    @include('layouts.Itemdropdown.Pesan')
                </ul>
            </li>
            <li class="relative px-6 py-3  border-b-2 border-dark">
                {!! request()->routeIs('Admin.Nav.Input-Bahan-baku-jadi') ? '<span class="absolute inset-y-0 left-0 w-1 bg-white rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>' : '' !!}
                <a data-turbolinks-action="replace"
                    class="inline-flex items-center w-full text-white text-sm font-semibold transition-colors duration-150  "
                    href="{{ route('Admin.Nav.Input-Bahan-baku-jadi') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="ml-4">Input Produksi Air Mineral</span>
                </a>
            </li>
            <li class="relative px-6 py-3  border-b-2 border-dark">
            {!! request()->routeIs('Admin.PesananCustomer') ? '<span class="absolute inset-y-0 left-0 w-1 bg-white rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>' : '' !!}
            <a data-turbolinks-action="replace"
                class="inline-flex items-center w-full text-white text-sm font-semibold transition-colors duration-150  "
                href="{{ route('Admin.PesananCustomer') }}">
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                    </path>
                </svg>
                <span class="ml-4">Pesanan Customer</span>
            </a>
        </li>
        @endcan
        @can('Manage-Supplier')
        <li class="relative px-6 py-3  border-b-2 shadow-inner border-dark {!! request()->routeIs('Supplier.Pemesanan-Supplier') ? 'bg-white rounded-tl-lg rounded-bl-lg hover:text-dark rounded-br-lg rounded-tr-lg' : '' !!}">
            <a data-turbolinks-action="replace"
                class="inline-flex items-center w-full {!! request()->routeIs('Supplier.Pemesanan-Supplier') ? 'text-dark' : 'text-white hover:text-gray-100' !!} text-sm font-semibold transition-colors duration-150     "
                href="{{ route('Supplier.Pemesanan-Supplier') }}">
                <svg class="w-5 h-5" ari a-hidden="true" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                <span class="ml-4">{{ __('Pemesanan Bahan Baku') }}</span>
            </a>
        </li>
        <li class="relative px-6 py-3  border-b-2 shadow-inner border-dark {!! request()->routeIs('Supplier.Input-Bahan-Baku') ? 'bg-white rounded-tl-lg rounded-bl-lg hover:text-dark rounded-br-lg rounded-tr-lg' : '' !!}">
            <a data-turbolinks-action="replace"
                class="inline-flex items-center w-full {!! request()->routeIs('Supplier.Input-Bahan-Baku') ? 'text-dark' : 'text-white hover:text-gray-100' !!} text-sm font-semibold transition-colors duration-150     "
                href="{{ route('Supplier.Input-Bahan-Baku') }}">
                <svg class="w-5 h-5" ari a-hidden="true" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                <span class="ml-4">{{ __('Input Bahan Baku') }}</span>
            </a>
        </li>
        @endcan
    </ul>
</div>
