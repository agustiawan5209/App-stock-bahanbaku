@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block w-full mt-1 text-sm  border-black focus:border-black focus:outline-none focus:shadow-outline-black  form-input']) !!}>
