@props(['route', 'active' => false])
<li>
  <a href="{{ $route }}" class="block py-15 md:py-0 md:pt-30 leading-none md:border-t-2 md:border-transparent {{ $active ? 'md:border-t-2 md:!border-black' : ''}} hover:md:border-t-2 hover:md:border-black">
    {{ $slot }}
  </a>
</li>