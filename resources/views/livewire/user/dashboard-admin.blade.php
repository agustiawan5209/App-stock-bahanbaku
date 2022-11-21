<div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 ">
        Dashboard |
        @if (session()->has('info'))
        <div class="bg-blue-100 rounded-lg py-5 px-6 mb-4 text-base text-blue-700 mb-3" role="alert">
            {{session('info')}}
          </div>
          @else
          <span class="text-sm text-gray-300"> {{ $hari}}</span>
        @endif
    </h2>

    @can('Manage-Admin')
        @if ($cekModal == true)
            <div class="flex flex-row">
                <span x-data="{ cekModal: @entangle('cekModal') }" class="flex flex-col h-full">
                    @if ($stock_habis != null)
                        @foreach ($stock_habis as $stocks)
                            <div
                                class="w-full h-36 bg-red-500 bg-opacity-[15%] px-7 py-8 md:p-9 rounded-lg shadow-md shadow-red-600 flex border-l-[6px] border-red-700">
                                <div
                                    class="max-w-[36px] w-fullh-9 flex items-center justify-center rounded-lg mr-5 bg-red-500 bg-opacity-30">
                                    <svg width="19" height="16" viewBox="0 0 19 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.50493 16H17.5023C18.6204 16 19.3413 14.9018 18.8354 13.9735L10.8367 0.770573C10.2852 -0.256858 8.70677 -0.256858 8.15528 0.770573L0.156617 13.9735C-0.334072 14.8998 0.386764 16 1.50493 16ZM10.7585 12.9298C10.7585 13.6155 10.2223 14.1433 9.45583 14.1433C8.6894 14.1433 8.15311 13.6155 8.15311 12.9298V12.9015C8.15311 12.2159 8.6894 11.688 9.45583 11.688C10.2223 11.688 10.7585 12.2159 10.7585 12.9015V12.9298ZM8.75236 4.01062H10.2548C10.6674 4.01062 10.9127 4.33826 10.8671 4.75288L10.2071 10.1186C10.1615 10.5049 9.88572 10.7455 9.50142 10.7455C9.11929 10.7455 8.84138 10.5028 8.79579 10.1186L8.13574 4.75288C8.09449 4.33826 8.33984 4.01062 8.75236 4.01062Z"
                                            fill="#FBBF24"></path>
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <h5 class="text-lg font-semibold mb-3 text-[#9D5425]">
                                        Stock <span
                                            class="font-bold border-b-2 border-red-700">{{ $stocks->default_stock->bahan_baku }}</span>
                                        @if (session()->has('message'))
                                            {{ session('message') }}
                                        @endif
                                    </h5>
                                    <p class="text-base text-[#D0915C] leading-relaxed">
                                        Pemberitahuan Stock Bahan Baku {{ $stocks->default_stock->bahan_baku }}
                                        @if (session()->has('message'))
                                            {{ session('message') }}
                                        @endif
                                        <br>
                                        Jumlah Stock : {{ $stocks->jumlah_stock }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    @if ($stock_habis50 != null)
                        @foreach ($stock_habis50 as $stocks)
                            <div
                                class="w-full h-36 bg-red-500 bg-opacity-[15%] px-7 py-8 md:p-9 rounded-lg shadow-md shadow-red-600 flex border-l-[6px] border-red-700">
                                <div
                                    class="max-w-[36px] w-fullh-9 flex items-center justify-center rounded-lg mr-5 bg-red-500 bg-opacity-30">
                                    <svg width="19" height="16" viewBox="0 0 19 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.50493 16H17.5023C18.6204 16 19.3413 14.9018 18.8354 13.9735L10.8367 0.770573C10.2852 -0.256858 8.70677 -0.256858 8.15528 0.770573L0.156617 13.9735C-0.334072 14.8998 0.386764 16 1.50493 16ZM10.7585 12.9298C10.7585 13.6155 10.2223 14.1433 9.45583 14.1433C8.6894 14.1433 8.15311 13.6155 8.15311 12.9298V12.9015C8.15311 12.2159 8.6894 11.688 9.45583 11.688C10.2223 11.688 10.7585 12.2159 10.7585 12.9015V12.9298ZM8.75236 4.01062H10.2548C10.6674 4.01062 10.9127 4.33826 10.8671 4.75288L10.2071 10.1186C10.1615 10.5049 9.88572 10.7455 9.50142 10.7455C9.11929 10.7455 8.84138 10.5028 8.79579 10.1186L8.13574 4.75288C8.09449 4.33826 8.33984 4.01062 8.75236 4.01062Z"
                                            fill="#FBBF24"></path>
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <h5 class="text-lg font-semibold mb-3 text-[#9D5425]">
                                        Stock <span
                                            class="font-bold border-b-2 border-red-700">{{ $stocks->default_stock->bahan_baku }}</span>
                                        @if (session()->has('message2'))
                                            {{ session('message2') }}
                                        @endif
                                    </h5>
                                    <p class="text-base text-[#D0915C] leading-relaxed">
                                        Pemberitahuan Stock Bahan Baku {{ $stocks->default_stock->bahan_baku }}
                                        @if (session()->has('message2'))
                                            {{ session('message2') }}
                                        @endif
                                        <br>
                                        Jumlah Stock : {{ $stocks->jumlah_stock }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    @if ($stock_habis_air != null)
                        @foreach ($stock_habis_air as $stocks)
                            <div
                                class="w-full h-36 bg-red-500 bg-opacity-[15%] px-7 py-8 md:p-9 rounded-lg shadow-md shadow-red-600 flex border-l-[6px] border-red-700">
                                <div
                                    class="max-w-[36px] w-fullh-9 flex items-center justify-center rounded-lg mr-5 bg-red-500 bg-opacity-30">
                                    <svg width="19" height="16" viewBox="0 0 19 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.50493 16H17.5023C18.6204 16 19.3413 14.9018 18.8354 13.9735L10.8367 0.770573C10.2852 -0.256858 8.70677 -0.256858 8.15528 0.770573L0.156617 13.9735C-0.334072 14.8998 0.386764 16 1.50493 16ZM10.7585 12.9298C10.7585 13.6155 10.2223 14.1433 9.45583 14.1433C8.6894 14.1433 8.15311 13.6155 8.15311 12.9298V12.9015C8.15311 12.2159 8.6894 11.688 9.45583 11.688C10.2223 11.688 10.7585 12.2159 10.7585 12.9015V12.9298ZM8.75236 4.01062H10.2548C10.6674 4.01062 10.9127 4.33826 10.8671 4.75288L10.2071 10.1186C10.1615 10.5049 9.88572 10.7455 9.50142 10.7455C9.11929 10.7455 8.84138 10.5028 8.79579 10.1186L8.13574 4.75288C8.09449 4.33826 8.33984 4.01062 8.75236 4.01062Z"
                                            fill="#FBBF24"></path>
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <h5 class="text-lg font-semibold mb-3 text-[#9D5425]">
                                        Stock <span
                                            class="font-bold border-b-2 border-red-700">{{ $stocks->default_bahan_air->bahan_baku }}</span>
                                        @if (session()->has('message'))
                                            {{ session('message') }}
                                        @endif
                                    </h5>
                                    <p class="text-base text-[#D0915C] leading-relaxed">
                                        Pemberitahuan Stock Bahan Baku {{ $stocks->default_bahan_air->bahan_baku }}
                                        @if (session()->has('message'))
                                            {{ session('message') }}
                                        @endif
                                        <br>
                                        Jumlah Stock : {{ $stocks->jumlah_stock }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    @if ($stock_habis50_air != null)
                        @foreach ($stock_habis50_air as $stocks)
                            <div
                                class="w-full h-36 bg-red-500 bg-opacity-[15%] px-7 py-8 md:p-9 rounded-lg shadow-md shadow-red-600 flex border-l-[6px] border-red-700">
                                <div
                                    class="max-w-[36px] w-fullh-9 flex items-center justify-center rounded-lg mr-5 bg-red-500 bg-opacity-30">
                                    <svg width="19" height="16" viewBox="0 0 19 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.50493 16H17.5023C18.6204 16 19.3413 14.9018 18.8354 13.9735L10.8367 0.770573C10.2852 -0.256858 8.70677 -0.256858 8.15528 0.770573L0.156617 13.9735C-0.334072 14.8998 0.386764 16 1.50493 16ZM10.7585 12.9298C10.7585 13.6155 10.2223 14.1433 9.45583 14.1433C8.6894 14.1433 8.15311 13.6155 8.15311 12.9298V12.9015C8.15311 12.2159 8.6894 11.688 9.45583 11.688C10.2223 11.688 10.7585 12.2159 10.7585 12.9015V12.9298ZM8.75236 4.01062H10.2548C10.6674 4.01062 10.9127 4.33826 10.8671 4.75288L10.2071 10.1186C10.1615 10.5049 9.88572 10.7455 9.50142 10.7455C9.11929 10.7455 8.84138 10.5028 8.79579 10.1186L8.13574 4.75288C8.09449 4.33826 8.33984 4.01062 8.75236 4.01062Z"
                                            fill="#FBBF24"></path>
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <h5 class="text-lg font-semibold mb-3 text-[#9D5425]">
                                        Stock <span
                                            class="font-bold border-b-2 border-red-700">{{ $stocks->default_bahan_air->bahan_baku }}</span>
                                        @if (session()->has('message2'))
                                            {{ session('message2') }}
                                        @endif
                                    </h5>
                                    <p class="text-base text-[#D0915C] leading-relaxed">
                                        Pemberitahuan Stock Bahan Baku {{ $stocks->default_bahan_air->bahan_baku }}
                                        @if (session()->has('message2'))
                                            {{ session('message2') }}
                                        @endif
                                        <br>
                                        Jumlah Stock : {{ $stocks->jumlah_stock }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </span>
            </div>
        @endif

    @endcan
    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full ">
                <svg class="w-6 h-6 text-primary " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 ">
                    Total Produksi
                </p>
                <p class="text-lg font-semibold text-gray-700 ">
                    {{$total_produksi}}
                </p>
            </div>
        </div>
        {{-- <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full ">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 ">
                    Total Pelanggan Bulan Ini
                </p>
                <p class="text-lg font-semibold text-gray-700 ">
                    {{$totalpelanggan}}
                </p>
            </div>
        </div> --}}
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full      ">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 ">
                    Total Pembelian Bulan Ini
                </p>
                <p class="text-lg font-semibold text-gray-700 ">
                    {{$pembelian}}
                </p>
            </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full      ">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 ">
                    Total Penjualan Bulan Ini
                </p>
                <p class="text-lg font-semibold text-gray-700 ">
                    {{ $total_penjualan }} Dus
                </p>
            </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
            <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full   ">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 ">
                    Status Pemesanan Bahan Baku Belum Di Konfirmasi
                </p>
                <p class="text-lg font-semibold text-gray-700 ">
                    {{$pesan}}
                </p>
            </div>
        </div>
    </div>

</div>

<div class="px-6 pt-6 2xl:container">
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @can('Manage-Admin')
            {{-- <div class="md:col-span-2 lg:col-span-1">
                <div class="h-full py-8 px-6 space-y-6 rounded-xl border border-gray-200 bg-white">
                    <div>
                        <h5 class="text-xl text-gray-600 text-center">Jumlah Stock Produk Yang tersedia Hari ini</h5>
                        <div class="mt-2 flex justify-center gap-4">
                            <h3 class="text-3xl font-bold text-gray-700">{{ $stock_hari_ini }}</h3>

                        </div>
                        <span class="block text-center text-gray-500">{{ date('F j, Y, g:i a') }}</span>
                    </div>
                    <table class="w-full text-gray-600">
                        <tbody>
                            <tr>
                                <td class="py-2">Penjualan Bulan Ini</td>
                                <td class="text-gray-500">{{ $bulan_ini }}</td>
                                <td>
                                    <svg class="w-16 ml-auto" viewBox="0 0 68 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.4" width="17" height="21" rx="1" fill="#e4e4f2" />
                                        <rect opacity="0.4" x="19" width="14" height="21" rx="1" fill="#e4e4f2" />
                                        <rect opacity="0.4" x="35" width="14" height="21" rx="1" fill="#e4e4f2" />
                                        <rect opacity="0.4" x="51" width="17" height="21" rx="1" fill="#e4e4f2" />
                                        <path
                                            d="M0 7C8.62687 7 7.61194 16 17.7612 16C27.9104 16 25.3731 9 34 9C42.6269 9 44.5157 5 51.2537 5C57.7936 5 59.3731 14.5 68 14.5"
                                            stroke="url(#paint0_linear_622:13631)" stroke-width="2"
                                            stroke-linejoin="round" />
                                        <defs>
                                            <linearGradient id="paint0_linear_622:13631" x1="68" y1="7.74997" x2="1.69701"
                                                y2="8.10029" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#E323FF" />
                                                <stop offset="1" stop-color="#7517F8" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> --}}
            <div>
                <div class="h-full py-6 px-6 rounded-xl border border-gray-200 bg-white">
                    <h5 class="text-xl text-gray-700">Jumlah Stock Bahan Baku Packaging</h5>
                    <div class="my-8">
                    </div>
                    <table class="mt-6 -mb-2 w-full text-gray-600">
                        <tbody>
                            @foreach ($stock as $stocks)
                                <tr>
                                    <td class="py-2">{{ $stocks->default_stock->bahan_baku }}</td>
                                    <td class="@if ($stocks->jumlah_stock <= 100) text-red-500 @else text-green-500 @endif">
                                        {{ $stocks->jumlah_stock }} : {{ $stocks->satuan }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <div class="lg:h-full py-8 px-6 text-gray-600 rounded-xl border border-gray-200 bg-white">

                    <div class="">
                        <h5 class="text-xl text-gray-700 text-center">Jumlah Stock Bahan Baku Air

                        </h5>
                        <table class="mt-6 -mb-2 w-full text-gray-600">
                            <tbody>
                                @foreach ($stockAir as $stocks)
                                    <tr>
                                        <td class="py-2">{{ $stocks->default_bahan_air->bahan_baku }}</td>
                                        <td class="@if ($stocks->jumlah_stock <= 100) text-red-500 @else text-green-500 @endif">
                                            {{ $stocks->jumlah_stock }} : {{ $stocks->satuan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endcan
    </div>
</div>
