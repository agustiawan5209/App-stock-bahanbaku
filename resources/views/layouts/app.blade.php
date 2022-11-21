<!DOCTYPE html>
<html x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ENV('APP_NAME') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- Styles -->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}" />
    <script src="{{ asset('js/alpine.min.js') }}" defer></script>
    <script src="{{ asset('js/init-alpine.js') }}" defer></script>
    @livewireStyles
    <script>
        new WOW().init();
    </script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        {{-- @include('layouts.menu') --}}
        @if (Route::has('Metode-Pembayaran'))
            @include('layouts.mobile-menu')
        @else
            ''
        @endif

        <div class="flex flex-col flex-1 w-full">
            <livewire:item.navigation-dropdown>
                <main class="h-full overflow-y-auto">
                    {{ $slot }}
                </main>
        </div>


        @stack('modals')

        @livewireScripts
        {{-- <script src="{{ asset('js/main.js') }}"></script> --}}

    </div>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#Image').change(function() {

                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);

            });
            var supplier = document.querySelectorAll('#Supplier_id');
            var HasilBahan = document.querySelectorAll('#HasilBahan');
            $('input[type="date"]').datetimepicker({
                format: 'YYYY-MM-DD',
                locale: 'en'
            });
        });
    </script>
</body>

</html>
