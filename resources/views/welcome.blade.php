<x-guest-layout title="dashboard">
    {{-- Video Frame --}}

    <!-- Section 1 -->
    <section class="px-2 py-10 bg-white md:px-0 bg-gradient-to-t from-red-50 to-white" data-wow-delay=".2s"
        style="background-image: url('{{ asset('img/brands/daniel-sinoca-AANCLsb0sU0-unsplash.jpg') }}'); background-size:cover; background-position-y:650px; ">
        <div class="container items-center max-w-6xl px-2 md:px-8 mx-auto xl:px-5">
            <div class="flex flex-col items-center sm:-mx-3 md:flex-row">
                <div class=" w-full md:w-1/2  wow fadeInUp">
                    <div class="w-full px-2 md:px-12 mx-auto h-auto overflow-hidden rounded-md sm:rounded-xl">
                        <video src="{{ asset('video/play.mp4') }}" class="w-full rounded-md" autoplay loop
                            aria-autocomplete="yes" muted></video>
                    </div>
                </div>
                <div class=" w-full md:w-1/2 wow fadeInRight" data-wow-delay=".5s">
                    <div
                        class="w-full px-12 py-12 mx-auto h-auto overflow-hidden rounded-md sm:rounded-xl bg-gradient-to-t from-transparent to-native shadow-lg">
                        <div class="font-semibold text-lg text-white">
                            CV THAHIRAH. Memproduksi Air Minum Dalam Kemasan (AMDK) HAUDH. Dengan pengolahan yang
                            bermutu tinggi, dan mengutamakan kualitas
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- carousel --}}

    <!-- Section 1 -->
    <section class="px-2 pb-32 pt-10  bg-blue-400 md:px-0"  style="background-image: url('{{ asset('img/brands/daniel-sinoca-AANCLsb0sU0-unsplash.jpg') }}'); background-size:cover; transform: rotate(180deg) skew(360deg); background-position-y: -17px;">
        <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5 z-10 wow fadeInleft "  data-wow-delay=".6s">
            <div class="flex flex-wrap items-center sm:-mx-3 md:order-2" style="transform: rotate(180deg) skew(360deg);">
                <div class="w-full md:w-1/2 md:px-3" >
                    <div
                        class=" w-full pb-6 space-y-6 sm:max-w-md lg:max-w-lg md:space-y-4 lg:space-y-8 xl:space-y-9 sm:pr-5 lg:pr-0 md:pb-0 " >
                        <h1
                            class="text-4xl font-extrabold tracking-tight text-white md:text-gray-800 sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl">
                            <span class="block xl:inline">CV. THAHIRAH</span>

                        </h1>
                        <span class="text-dark capitalize text-lg">Penuhi Kebutuhan Dehidrasi Harianmu Dengan Air Haudh Yang Berasal Dari Air Pegunungan Yang Diproses secara Alami Dan Terlindungu Kandungan Mineralnya. Air Haudh Kemasan Sangat Berguna Untuk Memenuhi Kebutuhan Air Dalam Tubuhmu Baik  D Rumah, Kantor, Atau Perjalanan.</span>

                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="w-full h-auto overflow-hidden rounded-md shadow-xl sm:rounded-xl wow fadeInTop" data-wow-delay=".6s">
                        <div class="relative">
                            <!-- Carousel wrapper -->
                            <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                                <!-- Item 1 -->
                                <div id="carousel-item-1" class="hidden duration-700 ease-in-out">
                                    <span
                                        class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">First
                                        Slide</span>
                                    <img src="{{ asset('img/blog/1.png') }}" class="block absolute  w-full" alt="...">
                                </div>
                                <!-- Item 2 -->
                                <div id="carousel-item-2" class="hidden duration-700 ease-in-out">
                                    <img src="{{ asset('img/blog/2.png') }}" class="block absolute " alt="...">
                                </div>
                                <!-- Item 3 -->
                                <div id="carousel-item-3" class="hidden duration-700 ease-in-out">
                                    <img src="{{ asset('img/blog/3.png') }}" class="block absolute " alt="...">
                                </div>
                                <!-- Item 4 -->
                                <div id="carousel-item-4" class="hidden duration-700 ease-in-out">
                                    <img src="{{ asset('img/blog/4.png') }}" class="block absolute " alt="...">
                                </div>
                            </div>
                            <!-- Slider indicators -->
                            <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                                <button id="carousel-indicator-1" type="button" class="w-3 h-3 rounded-full"
                                    aria-current="true" aria-label="Slide 1"></button>
                                <button id="carousel-indicator-2" type="button" class="w-3 h-3 rounded-full"
                                    aria-current="false" aria-label="Slide 2"></button>
                                <button id="carousel-indicator-3" type="button" class="w-3 h-3 rounded-full"
                                    aria-current="false" aria-label="Slide 3"></button>
                                <button id="carousel-indicator-4" type="button" class="w-3 h-3 rounded-full"
                                    aria-current="false" aria-label="Slide 4"></button>
                            </div>
                            <!-- Slider controls -->
                            <button id="data-carousel-prev" type="button"
                                class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none">
                                <span
                                    class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                    <span class="hidden">Previous</span>
                                </span>
                            </button>
                            <button id="data-carousel-next" type="button"
                                class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none">
                                <span
                                    class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    <span class="hidden">Next</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- feature --}}

    <!-- Section 1 -->
    {{-- <section class="py-20 bg-white"
        style="background-image: url('{{ asset('img/brands/daniel-sinoca-AANCLsb0sU0-unsplash.jpg') }}'); background-size:cover; background">
        <div class="container max-w-6xl mx-auto bg-transparent wow fadeInUp rounded-xl">
            <div class=" w-full rounded-lg bg-blue-200">
                <h2 class="text-4xl font-bold tracking-tight text-center font-mono">CV.THAHIRA</h2>
                <p class="mt-2 text-lg text-center text-gray-600">Keunggulan Produk</p>
            </div>
            <div class="grid overflow-hidden grid-cols-4 grid-rows-2 gap-4 mt-10 sm:px-8 xl:px-0">
                <div
                    class="relative flex flex-col items-center justify-between col-span-2 px-8 py-12 space-y-4 overflow-hidden bg-gray-100 sm:rounded-xl">
                    <img src="{{ asset('img/testimonials/WhatsApp Image 2022-06-12 at 07.34.16 (1).jpeg') }}" alt="">
                </div>

                <div
                    class="flex flex-col items-center justify-between col-span-2 px-8 py-12 space-y-4 bg-gray-100 sm:rounded-xl">
                    <img src="{{ asset('img/testimonials/WhatsApp Image 2022-06-12 at 07.34.17.jpeg') }}" alt="">
                </div>

                <div
                    class="flex flex-col items-center justify-between col-start-2 col-span-2 px-8 py-12 space-y-4 bg-gray-100 sm:rounded-xl">
                    <img src="{{ asset('img/testimonials/WhatsApp Image 2022-06-12 at 07.34.16.jpeg') }}" alt="">
                </div>

            </div>
        </div>
    </section> --}}

    <!-- Section 1 -->
    <section class="w-full bg-white pb-7">
        <div
            class="box-border flex flex-col items-center content-center px-8 mx-auto leading-6 text-black border-0 border-gray-300 border-solid md:flex-row max-w-7xl lg:px-16">

            <!-- Image -->
            <div
                class="box-border relative w-full max-w-md px-4 mt-5 mb-4 -ml-5 text-center bg-no-repeat bg-contain border-solid md:ml-0 md:mt-0 md:max-w-none lg:mb-0 md:w-1/2 xl:pl-10 wow fadeInLeft" data-wow-delay=".6s">
                <img src="{{asset('img/blog/4.png')}}"
                    class="p-2 pl-6 pr-5 xl:pl-16 xl:pr-20 ">
            </div>

            <!-- Content -->
            <div class="box-border order-first w-full text-black border-solid md:w-1/2 md:pl-10 md:order-none wow fadeInRight" data-wow-delay="0.6s" >
                <h2 class="m-0 text-xl font-semibold leading-tight border-0 border-gray-300 lg:text-3xl md:text-2xl">
                    Kebijakan Mutu
                </h2>
                <p class="pt-4 pb-8 m-0 leading-7 text-gray-700 border-0 border-gray-300 sm:pr-12 xl:pr-32 lg:text-sm">
                    Manajemen CV. Thahirah Bersama mempunyai homitmen untuk memuaskan pelanggan dengan memprodul Air
                    Minum Dalam Kemasan serual dengan persyaratan INI 3553-2015 dan SNI 110 9001 2015 sebagai sistem
                    manajemen mutu perusahaan dan secara konsisten alan terus menerus melakukan perbaikan secara
                    berkesinambungan terhadap sistem manajemen mutu perusahaan tersebut.
                </p>
                <ul class="p-0 m-0 leading-6 border-0 border-gray-300">
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-navy rounded-full"><span
                                class="text-sm font-bold">✓</span></span>Kebijakan mutu yang ditetapkan,
                        diimplementasilian secara honsisten dan disosialisasikan dengan menempatkan pada tempat-tempat
                        yang strategis dalam lokasi perusahaan agar dapat dibaca, dimengerti, dan diterapkan untuk
                        mencapai sasaran mutu perusahaan.
                    </li>
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-navy rounded-full"><span
                                class="text-sm font-bold">✓</span></span> Untuk memantau leefektifan dan beretualan dari
                        Kebijakan Mutu tersebut diatas, maka manajemen CV. Thahirah telah menetapkan untuk meninjaunya
                        retiap tahun.
                    </li>
                </ul>
            </div>
            <!-- End  Content -->
        </div>
        <div
            class="box-border flex flex-col items-center content-center px-8 mx-auto mt-2 leading-6 text-black border-0 border-gray-300 border-solid md:mt-20 xl:mt-0 md:flex-row max-w-7xl lg:px-16">

            <!-- Content -->
            <div class="box-border w-full text-black border-solid md:w-1/2 md:pl-6 xl:pl-32 wow fadeInLeft" data-wow-delay=".5s">
                <h2 class="m-0 text-xl font-semibold leading-tight border-0 border-gray-300 lg:text-3xl md:text-2xl">
                    Sasaran Dan Mutu
                </h2>
                <ul class="p-0 m-0 leading-6 border-0 border-gray-300">
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-navy rounded-full"><span
                                class="text-sm font-bold">✓</span></span> Bagian Produksi <br>
                        <ul class=" relative left-5">
                            <li class="flex flex-row items-start">
                                <span>
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </span>
                                Mencapai Produksi Sebanyak 200 Dus Perhari
                            </li>
                            <li class="flex flex-row items-start">
                                <span>
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </span>
                                Reject Produksi Maksimal 1% Perbulan
                            </li>
                            <li class="flex flex-row items-start capitalize">
                                <span>
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </span>
                                Melaksanakan Kalibrasi Akun 100% Sesuai Dengan Jadwal Yang DItetapkan
                            </li>
                        </ul>
                    </li>
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-navy rounded-full"><span
                                class="text-sm font-bold">✓</span></span> Bagian Administrasi Dan Keuangan <br>
                        <ul class=" relative left-5">
                            <li class="flex flex-row items-start capitalize">
                                <span>
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </span>
                                Absen Karyawan Tanpa Kehadiran Maksimal 1x Perbulan
                            </li>
                            <li class="flex flex-row items-start">
                                <span>
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </span>
                                Keterlambatan Karyawan Maksimal 15menit
                            </li>
                            <li class="flex flex-row items-start capitalize">
                                <span>
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </span>
                                Melaksanakan Pelatihan Maksimal Satu kali Dalam Setahun
                            </li>
                        </ul>
                    </li>
                    <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-navy rounded-full"><span
                                class="text-sm font-bold">✓</span></span> Bagian Pemasaran <br>
                        <ul class=" relative left-5">
                            <li class="flex flex-row items-start capitalize">
                                <span>
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </span>
                                Mencapai Angka Penjualan 200 perhari
                            </li>
                            <li class="flex flex-row items-start">
                                <span>
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </span>
                                Keluhan Pelanggan Maksimal 3 Perbulan
                            </li>
                            <li class="flex flex-row items-start capitalize">
                                <span>
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </span>
                                Pengiriman Produk Ke pelanggan 100% Sesuai Dengan Jadwal
                            </li>
                            <li class="flex flex-row items-start capitalize">
                                <span>
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </span>
                                Produk Yang dibeli dijamin 100% sesuai dengan Pesanan
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- End  Content -->

            <!-- Image -->
            <div
                class="box-border relative w-full max-w-md px-4 mt-10 mb-4 text-center bg-no-repeat bg-contain border-solid md:mt-0 md:max-w-none lg:mb-0 md:w-1/2 wow fadeInRight" data-wow-delay="0.6s">
                <img src="{{asset('img/blog/1.png')}}"
                    class="pl-4 sm:pr-10 xl:pl-10 lg:pr-32">
            </div>
        </div>
    </section>
    {{-- footer --}}
    <section id="contact" class="relative py-10 md:py-[120px]">
        <div class="absolute top-0 left-0 h-1/2 w-full bg-primary lg:h-2/5 xl:h-1/2 opacity-25" style="z-index: 0;"></div>
        <div class="container px-4 z-10">
          <div class="-mx-4 flex flex-wrap justify-between items-center">
            <div class="w-full px-4">
                <div class="ud-contact-title mb-12 lg:mb-[150px]">
                    <span class="mb-5 text-4xl font-semibold text-dark">
                    Tentang Kami
                    </span>
                  </div>
              <div class="ud-contact-content-wrapper">
                <div class="mb-12 flex  justify-around lg:mb-0">
                  <div class="mb-8 flex w-1/2 wow fadeInUp justify-center">
                    <div class="mr-6 text-[32px] text-primary">
                      <svg width="29" height="35" viewBox="0 0 29 35" class="fill-current">
                        <path
                          d="M14.5 0.710938C6.89844 0.710938 0.664062 6.72656 0.664062 14.0547C0.664062 19.9062 9.03125 29.5859 12.6406 33.5234C13.1328 34.0703 13.7891 34.3437 14.5 34.3437C15.2109 34.3437 15.8672 34.0703 16.3594 33.5234C19.9688 29.6406 28.3359 19.9062 28.3359 14.0547C28.3359 6.67188 22.1016 0.710938 14.5 0.710938ZM14.9375 32.2109C14.6641 32.4844 14.2812 32.4844 14.0625 32.2109C11.3828 29.3125 2.57812 19.3594 2.57812 14.0547C2.57812 7.71094 7.9375 2.625 14.5 2.625C21.0625 2.625 26.4219 7.76562 26.4219 14.0547C26.4219 19.3594 17.6172 29.2578 14.9375 32.2109Z" />
                        <path
                          d="M14.5 8.58594C11.2734 8.58594 8.59375 11.2109 8.59375 14.4922C8.59375 17.7188 11.2187 20.3984 14.5 20.3984C17.7812 20.3984 20.4062 17.7734 20.4062 14.4922C20.4062 11.2109 17.7266 8.58594 14.5 8.58594ZM14.5 18.4297C12.3125 18.4297 10.5078 16.625 10.5078 14.4375C10.5078 12.25 12.3125 10.4453 14.5 10.4453C16.6875 10.4453 18.4922 12.25 18.4922 14.4375C18.4922 16.625 16.6875 18.4297 14.5 18.4297Z" />
                      </svg>
                    </div>
                    <div>
                      <h5 class="mb-6 text-lg font-semibold">Lokasi</h5>
                      <p class="text-base text-body-color">
                        Jl. Poros
                        Bulukumba-Sinjai No.km 174, Bulo Lohe, Kec. Rilau Ale, Kabupaten Bulukumba, Sulawesi Selatan 92552
                      </p>
                    </div>
                  </div>
                  <div class="mb-8 flex w-1/2 wow fadeInUp items-start">
                    <div class="mr-6 text-[32px] text-primary">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone"
                        class="w-6 mr-4 text-primary" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor"
                            d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z">
                        </path>
                    </svg>
                    </div>
                    <div>
                      <h5 class="mb-6 text-lg font-semibold">Nomor Telpon</h5>
                      <p class="text-base text-body-color">0813-5091-8252</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</x-guest-layout>
