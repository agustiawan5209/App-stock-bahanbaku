<x-guest-layout title="Forgot password">
    <div class="flex items-center min-h-screen p-6 bg-gray-50  dark:bg-gray-900" >
        <div class="w-full h-full absolute z-0" style="background-image: url('{{asset('img/forgot-password-office.jpeg')}}'); backgorund-size:cover; filter:blur(3px)"></div>
        <div class="z-10 flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl   ">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full"
                        src="{{asset('img/forgot-password-office.jpeg')}}" alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700   ">Forgot password</h1>
                        @if ($errors->any())
                        <div class="mb-4">
                            <div class="font-medium text-red-600">Whoops! Something went wrong.</div>

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

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <label class="block text-sm">
                                <span class="text-gray-700   ">Email</span>
                                <input
                                    class="block w-full mt-1 text-sm       focus:border-blue-400 focus:outline-none focus:shadow-outline-purple       form-input"
                                    placeholder="Jane Doe" name="email" :value="old('email')" required autofocus />
                            </label>

                            <!-- You should use a button here, as the anchor is only used for the example  -->
                            <button
                                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-300 border border-transparent rounded-lg active:bg-blue-300 hover:bg-blue-500 focus:outline-none focus:shadow-outline-purple"
                                type="submit">
                                {{ __('Email Password Reset Link') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
