<x-guest-layout title="Login">
    <div class="flex items-center h-screen p-6 bg-white dark:bg-gray-900 z-10"
        style="background-image: url('{{ asset('img/login-office.jpeg') }}'); background-repeat:no-repeat; background-size:cover;">
        <div
            class="flex justify-center items-center h-9/12 w-full md:max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-xl  ">
            <div class="flex w-full justify-center h-full items-center overflow-hidden max-w-full ">
                {{-- <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
                        src="{{ asset('img/login-office.jpeg') }}" alt="Office" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                        src="{{ asset('img/login-office-dark.jpeg') }}" alt="Office" />
                </div> --}}
                <div class="flex items-center justify-center  sm:p-12">

                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 ">
                            @if ($errors->any())
                                <div class="mb-4 relative">
                                    <div class="font-medium text-sm text-red-600">Whoops! Terjadi Kesalahan.</div>
                                    <ul class="mt-3 text-xs text-red-600 list-disc list-inside ">
                                        @foreach ($errors->all() as $error)
                                            <li class="overflow-y-auto">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            Login
                        </h1>

                        @if (session('status'))
                            <div class="mb-4 text-sm font-medium text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <label class="block text-sm">
                                <span class="text-gray-700   ">Email</span>
                                <input
                                    class="block w-full mt-1 text-sm       focus:border-purple-400 focus:outline-none focus:shadow-outline-purple       form-input"
                                    placeholder="Jane Doe" name="email" value="{{ old('email') }}" required
                                    autofocus />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700   ">Password</span>
                                <input
                                    class="block w-full mt-1 text-sm       focus:border-purple-400 focus:outline-none focus:shadow-outline-purple       form-input"
                                    placeholder="***************" type="password" name="password" required
                                    autocomplete="current-password" />
                            </label>
                            <label class="block mt-4 text-sm">
                                <input type="checkbox" class="form-checkbox" name="remember"> <span
                                    class="ml-1 text-gray-700   ">{{ __('Remember me') }}</span>
                            </label>
                            <!-- You should use a button here, as the anchor is only used for the example  -->
                            <button
                                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-primary border border-transparent rounded-lg active:bg-primary hover:bg-indigo-500 focus:outline-none focus:shadow-outline-purple"
                                type="submit">
                                {{ __('Login') }}
                            </button>
                        </form>

                        <p class="mt-4">
                            <a class="text-sm font-medium text-navy  hover:underline"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            <a class="text-sm font-medium text-navy  hover:underline" href="{{ route('register') }}">
                                {{ __('Daftar') }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
