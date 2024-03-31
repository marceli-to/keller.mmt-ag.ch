@props(['value'])
<label {{ $attributes->merge(['class' => 'block text-black mb-8']) }}>
  {{ $value ?? $slot }}
</label>