@props(['class' => ''])
<nav class="mt-50 md:mt-0 text-base md:text-xs font-bold {{ $class }}">
  <ul class="md:flex md:space-x-40">
    slot 3
    {{ $slot }}
  </ul>
</nav>