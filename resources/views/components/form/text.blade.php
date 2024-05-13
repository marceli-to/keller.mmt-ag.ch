@props(['disabled' => false])
<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'relative block w-full min-h-140 p-10 text-xs placeholder:font-sans placeholder:text-xs placeholder:text-gray-500 focus:border-black focus:ring-0']) !!}>
</textarea>