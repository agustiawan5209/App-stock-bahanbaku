<li
    class="relative px-3 py-1 inline-flex items-center w-full {!! request()->routeIs('Admin.nav.Bahan-Baku') ? 'bg-gradient-to-r from-dark to-black rounded-lg text-white ': 'text-dark' !!} text-sm transition-colors duration-150">
    <a href="{{route('Admin.nav.Bahan-Baku')}}" class="inline-flex item-center">
        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2">
            </path>
        </svg>
        <div>Stock Bahan Baku Packaging</div>
    </a>
</li>
<li
    class="relative px-3 py-1 inline-flex items-center w-full {!! request()->routeIs('Admin.nav.Stock.Bahan-air') ? 'bg-gradient-to-r from-dark to-black rounded-lg text-white ': 'text-dark' !!} text-sm transition-colors duration-150">
    <a href="{{route('Admin.nav.Stock.Bahan-air')}}" class="inline-flex item-center">
        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2">
            </path>
        </svg>
        <div>Stock Bahan Baku Air</div>
    </a>
</li>
