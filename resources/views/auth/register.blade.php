<x-guest-layout title="Register">
    <div class="flex items-center min-h-screen p-6 bg-white  dark:bg-gray-900" style="background-image: url('{{asset('img/login-office.jpeg')}}'); background-size: cover;">
        <div class="flex justify-center items-center h-1/2 max-w-md mx-auto overflow-hidden bg-white rounded-lg shadow-xl md:mt-2 mt-20">
            <div class="flex flex-col overflow-y-auto md:flex-row md:max-w-md ">
                {{-- <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
                        src="{{ asset('img/create-account-office.jpeg') }}" alt="Office" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                        src="{{ asset('img/create-account-office-dark.jpeg') }}" alt="Office" />
                </div> --}}
                <div class="flex items-center justify-center p-6 sm:p-12 md:max-w-md " x-data="{ app: false }" x-on:click.outside="app = false">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700   " class="wow fadeInUp relative mx-auto max-w-[525px] overflow-hidden rounded-lg bg-white py-14 px-8 text-center sm:px-12 md:px-[60px]"
                        data-wow-delay=".15s">
                            Create account
                        </h1>
                        @if ($errors->any())
                            <div class="mb-4">
                                <div class="font-medium text-red-600">Whoops! Terjadi Masalah.</div>

                                <ul class="mt-3 text-sm text-red-600 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="mb-4 text-sm font-medium text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <label class="block text-sm">
                                <span class="text-gray-700   ">Name / Nama Toko </span>
                                <input
                                    class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple       form-input"
                                    placeholder="Jhon Doe /Toko Due" type="text" name="name" :value="old('name')" required
                                    autofocus autocomplete="name" />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700   ">Email</span>
                                <input
                                    class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple       form-input"
                                    placeholder="xxx@gmail.com" type="email" name="email" :value="old('email')" required />
                            </label>

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700   ">Daftar Sebagai</span>
                                <select name='role_id'
                                    class="block w-full mt-1 text-sm form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple">
                                    <option value="" >------</option>
                                    <option value="1" >Supplier</option>
                                    <option value="2" @click="app = true ">Pelanggan</option>
                                </select>
                            </label>
                            <label class="block mt-4 text-sm">
                                <label class="block text-sm">
                                    <span class="text-gray-700   ">
                                        Nomor Telepon
                                    </span>
                                    <div class="relative">
                                        <input type="number" name="phone" :value="old('phone')"  class="block w-full pl-20 mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"
                                            placeholder="08xxxxxxxxx" required/>
                                        <button
                                            class="absolute inset-y-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-primary border border-transparent rounded-l-md active:bg-primary hover:bg-blue-400 focus:outline-none focus:shadow-outline-purple">
                                            +62
                                        </button>
                                    </div>
                                </label>
                            </label>
                            <label class="block mt-4 text-sm" x-show='app'>
                                <span class="text-gray-700   ">Alamat</span>
                                <input
                                    class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple       form-input"
                                    placeholder="xxx@gmail.com" type="text" name="alamat" :value="old('alamat')" required />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700   ">Password</span>
                                <input
                                    class="block w-full mt-1 text-sm       focus:border-purple-400 focus:outline-none focus:shadow-outline-purple       form-input"
                                    placeholder="***************" type="password" name="password" required
                                    autocomplete="new-password" />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700   ">
                                    Confirm password
                                </span>
                                <input
                                    class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple       form-input"
                                    placeholder="***************" type="password" name="password_confirmation" required
                                    autocomplete="new-password" />
                            </label>

                            <!-- You should use a button here, as the anchor is only used for the example  -->
                            <button
                                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-primary border border-transparent rounded-lg active:bg-primary hover:bg-indigo-600 focus:outline-none focus:shadow-outline-purple"
                                type="submit">
                                {{ __('Register') }}
                            </button>
                        </form>

                        <p class="mt-4">
                            <a class="text-sm font-medium text-navy dark:text-purple-400 hover:underline"
                                href="{{ route('login') }}">
                                Already have an account? Login
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
