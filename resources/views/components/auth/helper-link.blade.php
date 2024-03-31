@props(['route'])
<a href="{{ $route }}" 
  wire:navigate 
  class="text-sm text-black no-underline hover:underline underline-offset-4 leading-none">
  {{ $slot }}
</a>