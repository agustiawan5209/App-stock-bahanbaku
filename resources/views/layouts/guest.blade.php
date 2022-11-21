<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo/favicon-32x32.png') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" /> --}}
    <!-- ==== WOW JS ==== -->
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <!-- Scripts -->
    {{-- <link rel="stylesheet" href="{{ asset('css/carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carousel/owl.theme.default.css') }}"> --}}
    {{-- <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" /> --}}
    <script src="{{ asset('js/alpine.min.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        new WOW().init();
    </script>

</head>

<body>
    {{-- navbar --}}
    <nav class="relative z-50 h-24 select-none bg-blue-400 fixed top-0" x-data="{ showMenu: false }">
        <div
            class="container relative flex flex-wrap items-center justify-between h-24 mx-auto overflow-hidden font-medium border-b border-gray-200 md:overflow-visible lg:justify-center sm:px-4 md:px-2">
            <div class="flex items-center justify-start w-1/4 h-full pr-4">
                <a href="{{ route('welcome') }}" class="inline-block py-4 md:py-0">
                    <span class="p-1 text-xl font-black leading-none text-gray-900"> <img
                            src="{{ asset('img/logo/Untitled.png') }}" width='100' alt="" srcset=""> </span>
                </a>
            </div>
            <div class="top-0 left-0 items-start hidden w-full h-1/2 p-4 text-sm bg-blur-400  md:items-center md:w-3/4 md:absolute lg:text-base md:bg-transparent md:p-0 md:relative md:flex"
                :class="{ 'flex fixed': showMenu, 'hidden': !showMenu }">
                <div
                    class="flex-col w-full h-auto overflow-hidden bg-blue-400 rounded-lg md:bg-blue-400 md:overflow-visible md:rounded-none md:relative md:flex md:flex-row">
                    <a href="#_"
                        class="inline-flex items-center block w-auto h-16 px-6 text-xl font-black leading-none text-gray-900 md:hidden"><img
                            src="{{ asset('img/logo/Untitled.png') }}" width='100' alt="" srcset=""><span
                            class="text-indigo-600">.</span></a>
                    <div
                        class="flex flex-col items-start justify-center w-full space-x-6 text-center lg:space-x-8 md:w-2/3 md:mt-0 md:flex-row md:items-center">

                    </div>
                    @if (Route::has('login'))
                        @auth
                            <div
                                class="flex flex-col items-start justify-end w-full pt-4 md:items-center md:w-1/3 md:flex-row md:py-0" x-data="{ProfileMenu: false}">
                                <li class="relative">
                                    <button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                                        @click="ProfileMenu = ! ProfileMenu" @keydown.escape="ProfileMenu = false" aria-label="Account"
                                        aria-haspopup="true">
                                        <img class="object-cover w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->name }}" aria-hidden="true" />
                                    </button>
                                    <div x-show="ProfileMenu">
                                        <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0" @click.away="ProfileMenu = false"
                                            @keydown.escape="ProfileMenu = false"
                                            class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md        "
                                            aria-label="submenu">
                                            <li class="flex">
                                                <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800   "
                                                    href="{{ route('dashboard') }}">
                                                    <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                        </path>
                                                    </svg>
                                                    <span>{{ __('Dashboard') }}</span>
                                                </a>
                                            </li>
                                            <li class="flex">
                                                <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800   "
                                                    href="/user/profile">
                                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                                    <span>{{ __('Setting') }}</span>
                                                </a>
                                            </li>
                                            @cannot('Manage-Customer')
                                            <li class="flex">
                                                <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800   "
                                                    href="{{route('MetodeCrud')}}">
                                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                                    <span>{{ __('Metode Pembayaran') }}</span>
                                                </a>
                                            </li>
                                            @endcannot
                                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                <li class="flex">
                                                    <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800   "
                                                        href="/user/api-tokens">
                                                        <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path
                                                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                            </path>
                                                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        </svg>
                                                        <span>{{ __('API Tokens') }}</span>
                                                    </a>
                                                </li>
                                            @endif

                                            <div class="border-t border-gray-100"></div>

                                            <!-- Team Management -->
                                            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    {{ __('Manage Team') }}
                                                </div>

                                                <li class="flex">
                                                    <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800   "
                                                        href="/teams/{{ Auth::user()->currentTeam->id }}">
                                                        <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path
                                                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                            </path>
                                                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        </svg>
                                                        <span>{{ __('Team Settings') }}</span>
                                                    </a>
                                                </li>
                                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                    <li class="flex">
                                                        <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800   "
                                                            href="/teams/create">
                                                            <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path
                                                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                                </path>
                                                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                            </svg>
                                                            <span>{{ __('Create New Team') }}</span>
                                                        </a>
                                                    </li>
                                                @endcan

                                                <div class="border-t border-gray-100"></div>

                                                <!-- Team Switcher -->
                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    {{ __('Switch Teams') }}
                                                </div>

                                                @foreach (Auth::user()->allTeams() as $team)
                                                    <form method="POST" action="/current-team">
                                                        @method('PUT')
                                                        @csrf
                                                        <!-- Hidden Team ID -->
                                                        <input type="hidden" name="team_id" value="{{ $team->id }}">

                                                        <li class="flex">
                                                            <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800   "
                                                                href="#"
                                                                onclick="event.preventDefault(); this.closest('form').submit();">

                                                                <svg class="w-5 h-5 mr-2 @if (Auth::user()->isCurrentTeam($team)) text-green-400 @else text-gray-400 @endif"
                                                                    fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                                </svg>
                                                                <span>{{ $team->name }}</span>
                                                            </a>
                                                        </li>
                                                    </form>
                                                @endforeach
                                            @endif

                                            <div class="border-t border-gray-100"></div>

                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <li class="flex">
                                                    <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800   "
                                                        href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                                        <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path
                                                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                                            </path>
                                                        </svg>
                                                        <span>{{ __('Logout') }}</span>
                                                    </a>
                                                </li>
                                            </form>
                                        </ul>
                                    </div>
                                </li>
                            </div>
                        @else
                            <div
                                class="flex flex-col items-start justify-end w-full pt-4 md:items-center md:w-1/3 md:flex-row md:py-0">
                                <a href="{{ route('login') }}"
                                    class="w-full px-6 py-2 mr-0 text-gray-700 md:px-0 lg:pl-2 md:mr-4 lg:mr-5 md:w-auto">Masuk</a>
                                <a href="{{ route('register') }}"
                                    class="inline-flex items-center w-full px-6 py-3 text-sm font-medium leading-4 text-dark bg-gray-50 md:px-3 md:w-auto md:rounded-full lg:px-5 hover:bg-gray-50 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-gray-50">Daftar</a>
                            </div>
                        @endauth
                    @endif
                </div>
            </div>
            <div @click="showMenu = !showMenu"
                class="absolute right-0 flex flex-col items-center items-end justify-center w-10 h-10 bg-white rounded-full cursor-pointer md:hidden hover:bg-gray-100">
                <svg class="w-6 h-6 text-gray-700" x-show="!showMenu" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" x-cloak="">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg class="w-6 h-6 text-gray-700" x-show="showMenu" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" x-cloak="">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </div>
        </div>
    </nav>
    <section class="w-full antialiased bg-gray-100">
        <div class="">
            <!-- Main Hero Content -->
            <main>
                {{ $slot }}
            </main>

        </div>
    </section>

    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/slick.js') }}"></script>

    <script>
        const items = [{
                position: 0,
                el: document.getElementById('carousel-item-1')
            },
            {
                position: 1,
                el: document.getElementById('carousel-item-2')
            },
            {
                position: 2,
                el: document.getElementById('carousel-item-3')
            },
            {
                position: 3,
                el: document.getElementById('carousel-item-4')
            },
        ];

        const options = {
            activeItemPosition: 2,
            interval: 3000,

            indicators: {
                activeClasses: 'bg-white dark:bg-gray-800',
                inactiveClasses: 'bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800',
                items: [{
                        position: 0,
                        el: document.getElementById('carousel-indicator-1')
                    },
                    {
                        position: 1,
                        el: document.getElementById('carousel-indicator-2')
                    },
                    {
                        position: 2,
                        el: document.getElementById('carousel-indicator-3')
                    },
                    {
                        position: 3,
                        el: document.getElementById('carousel-indicator-4')
                    },
                ]
            },
        };
        const carousel = new Carousel(items, options);
        // goes to the next (right) slide
        carousel.next()

        // goes to the previous (left) slide
        carousel.prev()
        // starts or resumes the carousel cycling (automated sliding)
        carousel.cycle()

        // pauses the cycling (automated sliding)
        carousel.pause()
        const prevButton = document.getElementById('data-carousel-prev');
        const nextButton = document.getElementById('data-carousel-next');

        prevButton.addEventListener('click', () => {
            carousel.prev();
        });

        nextButton.addEventListener('click', () => {
            carousel.next();
        });
    </script>

</html>
