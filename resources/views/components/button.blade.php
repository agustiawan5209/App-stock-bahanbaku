<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-navy border border-transparent rounded-lg active:bg-navy hover:bg-navy focus:outline-none focus:shadow-outline-navy']) }}>
    {{ $slot }}
</button>
